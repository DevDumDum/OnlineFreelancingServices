<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$user = $this->session->userdata('UserLoginSession');
$posts = $this->db
    ->select('post.*, profession.profession_type, profession.description as profession_description')
    ->where('poster_ID', $user['id'])
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
// echo json_encode($posts);
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
          <th>Job</th>
          <th>Applicants</th>
        </tr>

        <div>
          <?php foreach ($posts as $post) : ?>
          <tr>
            <td onclick="newDetails()">
              <b><?= $post->profession_type ?></b>
              <!--Job Description-->
              <span>#<?= $post->ID ?></span>
              <?= $post->profession_description ?>
              <hr>
              <?= $post->requirements ?>
            </td>
            <td>
              <table style="width: 100%">
                <?php foreach ($post->applicants as $applicant) : ?>
                <tr>
                  <td>
                    <?= $applicant->first_name ?>
                    <?= $applicant->middle_name ?>
                    <?= $applicant->last_name ?>
                  </td>
                  <td style="text-align: right">
                    <form method="post" name="accept-<?= $post->ID ?>-<?= $applicant->id ?>">
                      <input type="hidden" name="applicant_email" value="<?= $applicant->email ?>">
                      <input type="hidden" name="post_id" value="<?= $post->ID ?>">
                      <input type="hidden" name="applicant_id" value="<?= $applicant->id ?>">
                    </form>
                    <?php if (!$applicant->accepted) : ?>
                    <button class="editbtn1 editbtn1-responsiveness" style="cursor: pointer;"
                      onclick="acceptApplicant('<?= $post->ID ?>', '<?= $applicant->id ?>')">Accept</button>
                    <?php else : ?>
                    <span style="color: green;">Accepted</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php if (count($post->applicants) == 0) : ?>
                <tr>
                  <td colspan="3">
                    <div style="color: red">No Applicants yet
                    </div>
                  </td>
                </tr>
                <?php endif ?>
              </table>
            </td>

          </tr>

          <?php endforeach; ?>
          <?php if (count($posts) == 0) : ?>
          <tr>
            <td colspan="3">
              <div style="color: red">No Posted Jobs
              </div>
            </td>
          </tr>
          <?php endif ?>
        </div>
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

  function acceptApplicant(postId, applicantId) {
    confirm("Are you sure you want to accept this applicant?") && (
      document.forms['accept-' + postId + '-' + applicantId].submit()
    );
  }
  </script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>