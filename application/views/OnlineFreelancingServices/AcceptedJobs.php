<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$user = $this->session->userdata('UserLoginSession');
$id = $user['id'];
$posts = $this->db
    ->select('post.*, profession.profession_type, profession.description as profession_description, users.first_name, users.last_name, users.middle_name, users.contact, users.email')
    ->join('users', 'users.id = post.poster_ID')
    ->where('post.status', 0)
    ->where("post.accepted LIKE '$id' OR post.accepted LIKE '%,$id' OR post.accepted LIKE '$id,%' OR post.accepted LIKE '%,$id,%'")
    // ->group_end()
    ->join('profession', 'profession.ID = post.profession_ID')
    ->get('post')->result();
foreach ($posts as $post) {
    $applicants = $post->applicants;
    $accepted = $post->accepted;
    $applicants = explode(',', $applicants);
    $accepted = explode(',', $accepted);
    $post->applicants = array();
    $post->applicants_list = $applicants;
    foreach ($applicants as $applicant_id) {
        if ($applicant_id != $id) {
            continue;
        }
        $user = $this->db
            ->select("id, first_name, last_name, middle_name, contact, email")->from('users')
            ->where('id', $applicant_id)
            ->where('status', 1)
            ->get()->row();
        if ($user) {
            $user->accepted = in_array($user->id, $accepted);
            $post->applicants[] = $user;
        }
    }
}
// die;
if ($this->session->userdata('UserLoginSession')) {
    $udata = $this->session->userdata('UserLoginSession');
} else {
    redirect(base_url('index.php/Loginpage'));
}
?>

<body>
  <!--BACK BUTTON-->
  <div class="container">
    <button class="btn" onclick="window.location.href='<?php echo base_url('NewsFeed'); ?>';">Back</button>
    <div class="btn_category">
      <button class="btn" onclick="window.location.href='AppliedJob';">Applied Jobs</button>
      <button class="btn" onclick="window.location.href='PostedJob';">Posted Jobs</button>
      <button class="btn" onclick="window.location.href='AcceptedJob';">Accepted Jobs</button>
    </div>
    <!---NEW USER TABLE-->
    <div class="tables">
      <table class="table table-dark table-hover center">
        <tr>
          <th>Client</th>
          <th>Job</th>
          <th>Action/Status</th>
        </tr>

        <?php foreach ($posts as $post) : ?>
        <tr>
          <td onclick="newDetails()">

            <span>
              <?= $post->first_name ?>
              <?= $post->middle_name ?>
              <?= $post->last_name ?>
            </span>
          </td>
          <td>
            <span>
              Job #<?= $post->ID ?>&emsp;
              <b><?= $post->profession_type ?></b>
              <br>
              <?= $post->profession_description ?>
              <hr>
              <?= $post->requirements ?>
            </span>
          </td>

          <td class="status" style="text-align: right">
          <?php if ($post->email_client == 0): ?>
            <button class="editbtn1 editbtn1-responsiveness" style="cursor: pointer;" id="email" onclick="sendEmail('<?=$post->ID?>', '<?=$post->email?>')">Email Client</button>
            <?php endif ?>
          </td>
        </tr><?php endforeach ?>
        <?php if (count($posts) == 0) : ?>
        <tr>
          <td colspan="3">
            <div style="color: red">No Accepted Jobs
            </div>
          </td>
        </tr>
        <?php endif ?>
      </table>
    </div>
  </div>
  <script>
  function newDetails() {
    document.getElementById("hiddenbox").style.display = "block";
    document.getElementById("hiddenbox").style.animation = "fadebox .3s reverse linear";
  }

  function hidebox() {
    document.getElementById("hiddenbox").style.display = "none";
  }
  function sendEmail(postId, email) {
    // ask for input
    let email_client = prompt("Please enter your message", "Hello, I am interested in your job. Thank you for accepting my application.");
    if (email_client == null || email_client == "") {
      alert("Please enter your email");
      return;
    }
    // send email
    fetch('<?=base_url('index.php/OnlineFreelancingServices/sendEmail')?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        message: email_client,
        email: email,
        post_id: postId
      })
    })
      .then(response => response.json())
      .then(data => {
        console.log(data)
        if (data.sent) {
          alert("Email sent");
        } else {
          alert("Email not sent");
        }
      })
      .catch(err => {
        console.log(err);
      })
      .finally(() => {
        // reload
        window.location.reload();
      })
  }
  </script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>