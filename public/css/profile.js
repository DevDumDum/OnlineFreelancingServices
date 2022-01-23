const imgDiv = document.querySelector('.cover-pic-div');
const img = document.querySelector('#photoCover');
const file  = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener('mouseenter', function () {
    uploadBtn.style.display = "block";
});

imgDiv.addEventListener('mouseleave', function() {
    uploadBtn.style.display = "none";
});

file.addEventListener('change', function(){
    const choosedFile = this.files[0];

    if (choosedFile) {
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});


const imgDivProfile = document.querySelector('.profile-pic-div');
const imgProfile = document.querySelector('#photoProfile');
const fileProfile  = document.querySelector('#fileProfile');
const uploadBtnProfile = document.querySelector('#uploadBtnProfile');


imgDivProfile.addEventListener('mouseenter', function () {
    uploadBtnProfile.style.display = "block";
});

imgDivProfile.addEventListener('mouseleave', function() {
    uploadBtnProfile.style.display = "none";
});

fileProfile.addEventListener('change', function(){
    const choosedFileProfile = this.files[0];

    if (choosedFileProfile) {
        const readerProfile = new FileReader();

        readerProfile.addEventListener('load', function(){
            imgProfile.setAttribute('src', readerProfile.result);
        });

        readerProfile.readAsDataURL(choosedFileProfile);
    }
});

const date = new Date();

const renderCalendar = () => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().toDateString();

  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today">${i}</div>`;
    } else {
      days += `<div>${i}</div>`;
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">${j}</div>`;
    monthDays.innerHTML = days;
  }
};

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

renderCalendar();

function switchEdit() {
  document.getElementById('editDiv').style.display = "none";
  document.getElementById('saveDiv').style.display = "block";
  document.getElementById('cancelDiv').style.display = "block";
}
function switchCancel() {
  document.getElementById('editDiv').style.display = "block";
  document.getElementById('saveDiv').style.display = "none";
  document.getElementById('cancelDiv').style.display = "none";
}