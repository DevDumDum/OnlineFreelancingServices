<?php defined('BASEPATH') or exit('No direct script access allowed');

?>

<body class="profileBody">
  <?= form_open(base_url('Profilepage'), array('name' => 'profile', 'method' => 'post', 'enctype' => 'multipart/form-data')) ?>
  <div class="profileBody-container">
    <div class="row-profile">
      <div class="col-12 profilebanner">
        <div class="cover-pic-div">
          <img src="<?= base_url() ?>uploads/users/<?= $user->id ?>/<?= $user->ProfBanner ?>" id="photoCover">
          <input type="file" id="file" onchange="uploadBanner(this);" name="cover_pic" accept="image/*">
          <label for="file" id="uploadBtn">
            <div class="uploadingofcover">
              <i class="fal fa-upload"></i><br>
              <h3>Add banner image<h3>
            </div>
          </label>
          <!---INSERT REMOVE PHOTO BUTTON--->
        </div>
      </div>

      <div class="col-12 profile-wrapper" style="z-index: 0;">
        <div class="col-10 profilecontent">
          <div class="profile-container">
            <div class="profile-pic-div">
              <img src="<?= base_url() ?>uploads/users/<?= $user->id ?>/<?= $user->ProfPic ?>" id="photoProfile">
              <input type="file" id="fileProfile" onchange="uploadProfile(this);" name="profile_pic" accept="image/*">
              <label for="fileProfile" id="uploadBtnProfile">Choose Photo</label>
            </div>
            <!---INSERT CODE LOCATION---->
            <!-- LOCATION CODE HERE!!!-->
            <p id=location-profile> <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.200523654514!2d120.97700491449882!3d14.644555779924874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b5c7b9e0893d%3A0x5a409de362168821!2sC-3%2C%20Grace%20Park%20West%2C%20Caloocan%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1642690241288!5m2!1sen!2sph"
                width="300" height="200" style="border: 1rem;" allowfullscreen="" loading="lazy"></iframe></p>

            <h1 class="profileUsername">
              <?= $user->first_name ?>
              <?= $user->middle_name ?>
              <?= $user->last_name ?>
            </h1>

            <div class="switchBox">
              <label class="switch">
                <input type="checkbox" <?= $user->status == 1 ? 'checked' : '' ?>>
                <span class="slider">
                  <h4 id="h4-status">Status</h4>
                </span>
              </label>
            </div>
          </div>

          <div class="col-9 profilebuttons">
            <div class="button-sameline">
              <!-- <form method="POST" action=""> -->
              <div class="profile-button">
                <div class="mx-2" id="editDiv" style="display: block;">
                  <button class="editprofilebutton btn btn-primary btn-sm" type="button" id="editProfile"
                    onclick="switchEdit()">
                    <i class="editprofilebtnicon fal fa-pencil"></i>Edit Profile
                  </button>
                </div>

                <div class="mx-2" id="saveDiv" style="display: none;">
                  <button button type="button" class="saveprofilebutton btn btn-primary btn-sm"
                    onclick="document.forms.profile.submit()">
                    Save
                  </button>
                </div>

                <div class="mx-2" id="cancelDiv" style="display: none;">
                  <button button type="submit" class="cancelprofilebutton btn btn-sm" onclick="switchCancel()">
                    Cancel
                  </button>
                </div>

                <div class="rightbutton">
                  <button type="button" class="messageprofilebtn btn btn-primary btn-sm">Message</button>
                </div>
              </div>
              <!-- </form> -->

              <div class="profile-input">
                <input class="inputCont" type="text" id="" name="description" placeholder="Add description" disabled
                  value="">
              </div>
            </div>
          </div>

          <div class="col-12 profile-calendar-conts">
            <div class="container_calendar">
              <div class="calendar">
                <div class="month">
                  <i class="fas fa-angle-left prev"></i>
                  <div class="date">
                    <h1></h1>
                    <p></p>
                  </div>
                  <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                  <div>Sun</div>
                  <div>Mon</div>
                  <div>Tue</div>
                  <div>Wed</div>
                  <div>Thu</div>
                  <div>Fri</div>
                  <div>Sat</div>
                </div>
                <div class="days"></div>
              </div>
            </div>

            <div class="profile-projCont">
              <div class="profileProjwrapper">
                <div class="profileProjContainer">
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                      <div class="card">
                        <img src="./public/images/sample.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                      <div class="card">
                        <img src="./public/images/sample.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                      <div class="card">
                        <img src="./public/images/sample.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="container-ratings">
                  <h3 id="h3-ratings">RATINGS</h3>
                  <div class="rating">
                    <input type="radio" name="star" id="star1"> <label for="star1"></label>
                    <input type="radio" name="star" id="star1"> <label for="star2"></label>
                    <input type="radio" name="star" id="star1"> <label for="star3"></label>
                    <input type="radio" name="star" id="star1"> <label for="star4"></label>
                    <input type="radio" name="star" id="star1"> <label for="star5"></label>
                  </div>
                </div>

                <div class="info-cont d-flex flex-column bd-highlight mb-3">
                  <div class="p-2 bd-highlight">
                    EDUCATIONAL ATTAINMENT<input class="eduAttainment" type="text" id="" name="eduAttainment"
                      placeholder="+" disabled value="">
                  </div>
                </div>
                <div class="info-cont d-flex flex-column bd-highlight mb-3">
                  <div class="p-2 bd-highlight">
                    EXPERTISE<input class="expertise" type="text" id="" name="expertise" placeholder="+" disabled
                      value="">
                  </div>
                </div>
                <div class="info-cont d-flex flex-column bd-highlight mb-3">
                  <div class="p-2 bd-highlight">
                    CONTACT INFORMATION<input class="contact-info" type="text" id="" name="contact-info" placeholder="+"
                      disabled value="">
                  </div>
                </div>




              </div>
            </div>



          </div>



        </div>
      </div>
    </div>
  </div>
  <?= form_close() ?>
  <script type="text/javascript" src="<?php echo base_url("public/css/profile.js") ?>"> </script>

  <script>
  const uploadBanner = el => {
    const files = el.files
    if (files.length > 0) {
      const file = files[0]
      const formData = new FormData()
      formData.append('file', file);
      formData.append('user_id', '<?= $user->id ?>');
      formData.append('file_type', 'cover')
      fetch('<?= base_url() ?>OnlineFreelancingServices/upload_profile', {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          console.log(data)
        })
        .catch(err => console.log(err))
    }
  }


  const uploadProfile = el => {
    const files = el.files
    if (files.length > 0) {
      const file = files[0]
      const formData = new FormData()
      formData.append('file', file);
      formData.append('user_id', '<?= $user->id ?>')
      formData.append('file_type', 'profile')
      fetch('<?= base_url() ?>OnlineFreelancingServices/upload_profile', {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          console.log(data)
        }).catch(err => console.log(err))
      //     .then(res => res.json())
      //     .then(data => {
      //       console.log(data)
      //       document.querySelector('#profile').src = data.secure_url
      //     })
      //     .catch(err => console.log(err))
    }
  }
  </script>

</body>

</html>