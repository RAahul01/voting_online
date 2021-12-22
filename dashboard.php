<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dash.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="refresh" content="600;url=logout.php"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   </head>
   

<body>
  
        
  <?php include 'includes/sidenav.php'; ?>

  <section class="home-section">
     <center> <div class="text"><h1>Welcome to Vote My India &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</h1></div></center>
      
    <link rel="stylesheet" href="clock.css">
    <div class="container">
      <div class="icons">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
      </div>
      <div class="time">
        <div class="time-colon">
          <div class="time-text">
            <span class="num hour_num">08</span>
            <span class="text">Hours</span>
          </div>
          <span class="colon">:</span>
        </div>
        <div class="time-colon">
          <div class="time-text">
            <span class="num min_num">45</span>
            <span class="text">Minutes</span>
          </div>
          <span class="colon">:</span>
        </div>
        <div class="time-colon">
          <div class="time-text">
            <span class="num sec_num">06</span>
            <span class="text">Seconds</span>
          </div>
          <span class="am_pm">AM</span>
        </div>
      </div>
    </div>
<marquee  bgcolor="red" >hiii</marquee>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">&nbsp</div>
            <div class="number">Vote Now</div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div><a href="submit_ballot.php">
          <i class='fas fa-vote-yea cart two' style='font-size:24px;'></i></a>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Go To Your Profile</div>
            <div class="number">Your Profile</div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bxs-user  cart two' ></i>
        </div>
        
        
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <center><div class="title"><u>News Feed</u></div></center>
         
        </div>
        
        </div>
      </div>
    </div>
  
  
 
       <!-- <center> <a href="votesystem/index.php"><input type="submit" value="Proceed To Vote"/></a><center> -->


   <!-- <a href="votesystem/index.php"><center><button><h1>Proceed To Vote</h1></button></center></a>
 !-->

  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  searchBtn.addEventListener("click", ()=>{ 
    sidebar.classList.toggle("open");
    menuBtnChange(); 
  });


  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
   }
  }
  </script>
  <script>
  let section = document.querySelector("section"),
  icons = document.querySelector(".icons");

  icons.onclick = ()=>{
    section.classList.toggle("dark");
  }


  setInterval(()=>{

    let date = new Date(),
    hour = date.getHours(),
    min = date.getMinutes(),
    sec = date.getSeconds();

    let d;
    d = hour < 12 ? "AM" : "PM";
    hour = hour > 12 ? hour - 12 : hour; 
    hour = hour == 0 ? hour = 12 : hour; 

    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;

    document.querySelector(".hour_num").innerText = hour;
    document.querySelector(".min_num").innerText = min;
    document.querySelector(".sec_num").innerText = sec;
    document.querySelector(".am_pm").innerText = d;

  }, 1000);

  </script>

</body>
</html>