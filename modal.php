<?php include('header.php');?>
<style>
html {
    box-sizing: border-box;
}

*,
*:after,
*:before {
    -webkit-box-sizing: inherit;
    -moz-box-sizing: inherit;
    box-sizing: inherit;
}
$lightBlue : #E2ECF0;
$darkBlue: #9BB7C5;
$aqua: #00BFBE;
body {
    background: #eee;
    padding-top: 50px;
		font-family: sans-serif;
}
input{
  border: none;
  outline:none;
}
input:focus {
    border: none;
    outline: none;
}
.title{
  font-size: 30px;
  margin-bottom: 20px;
  text-align: center;
}
.header {
    max-width: 400px;
    background: #fff;
    height: 50px;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    &__search {
        margin: 0 10px;
        position: relative;
        width: 140px;
        &:after {
            content: '';
            position: absolute;
            height: 100%;     width: 2px;
            background: #eee;
            display: block;
            right: -20px;
            top: 0;
        }
        .search-icon {
            position: absolute;
            left: 10px;
            top: 5px;
            color: $darkBlue;
        }
        .search-field{
            background: $lightBlue;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
       
            border-radius: 20px;
            height: 30px;
            width: 100%;
            padding-left: 30px;
            padding-right: 5px;
            font-size: 1.3em;
        }
    }
    &__notification {
        width: 100px;
        background: #fff;
        height: 20px;
        margin: 0 10px;
        display: flex;
        justify-content: space-around;
        .bell-icon {
            position: relative;
            cursor: pointer;
            &:hover {
                color: #eee;
            }
            .notification-number {
              font-size: 0.6em;
              border-radius: 50%;
              background-color: $aqua;
              border: 5px solid $aqua;
              color: #FFFFFF;
            }
            .bell-number {
                position: absolute;
                top: -50%;
                left: 50%;
            }
            .notification__list {
                position: absolute;
                background: $lightBlue;
                width: 230px;
                list-style-type: none;
                text-align: center;
                left: -90px;
                top: 50px;
                border-radius: 7px;
                -webkit-animation: fadeIn 1s;     animation: fadeIn 1s;
                &:before {
                    content: "";
                    position: absolute;
                    width: 0;
                    height: 0;
                    border: 10px solid transparent;
                    border-bottom-color: #fff;
                    left: 50%;
                    top: -20px;
                    transform: translate(-50%);
                }
                &__name {
           
                    background: #fff;
                    color: $darkBlue;
                    padding: 10px 0;
                    border-top-left-radius: 7px;
                    border-top-right-radius: 7px;
                    border-bottom: 1px solid $darkBlue;
                    transition: all 1s ease-in-out;
                }
                .large-number {
                    font-size: 0.8em;
                    border-width: 5px;
                }    }
            .list__item {
                border-bottom: 1px solid $darkBlue;
                transition: all 1s ease-in-out;
                .user-image {
                    width: 40px;
                    height: 40px;
                    -webkit-border-radius: 50px;
                    -moz-border-radius: 50px;
                    border-radius: 50px;
                }
                .messages {
                    padding-left: 10px;
                    color: #909DA8;
                    b {
                        color: #727F8C;
                    }
                }
                &--link {
                    display: flex;
                    padding: 10px;
                    text-decoration: none;
                    text-align: left;
                    font-size: 0.7em;
                    opacity: 0.8;
                    align-items: center;
                    &:hover {
                        opacity: 1;
        
                    }
                }
            }
        }
    }
    &__profile {
        width: 120px;
        align-self:stretch;
        background: #9BB7C5;
        display: flex;
        justify-content: space-around;
        align-items: center;
        & .profile__photo {
            background: url(https://cdn.tutsplus.com/net/uploads/legacy/213_chris/ChrisThumbnail.jpg);
            width: 30px;
            height: 30px;
            -webkit-background-size: cover;
            background-size: cover;
            border-radius: 50%;
        }
        & .fa-arrow-circle-o-down {
            font-size: 1.6em;
            color: #fff;
        }
    }
}

.small-icon {
    font-size: 1.2em;color: #D0DADF;
}

section {
    max-width: 400px;
    margin: auto;
}

.hide {
    display: none;
}

@-webkit-keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.checklist{
  max-width: 400px;.
  margin: 10px auto;
  li{
    padding: 5px 10px;
    list-style-type: disc;
  }
}

</style>

  
<h1 class="title">Notification System (Without jQuery)</h1>
<div class="header">
  
  <div class="header__notification">
      <div class="fa fa-bell-o bell-icon small-icon"><i class="fa fa-bell"></i>
        <span class="notification-number bell-number">3</span>
        <ul class="notification__list dropdown hide">
          <h3 class="notification__list__name">Notifications
            <span class="notification-number large-number">3</span>
          </h3>
          <li class="list__item">

  <a href="#" class="list__item--link">
              <img src="https://cdn.tutsplus.com/net/uploads/legacy/213_chris/ChrisThumbnail.jpg" alt="" class="user-image" />
              <span class="messages">
                <b>Ross Gellar </b> posted a photo on your wall.
              </span>
            </a>
          </li>
          <li class="list__item">
            <a href="#" class="list__item--link">
              <img src="https://cdn.tutsplus.com/net/uploads/legacy/213_chris/ChrisThumbnail.jpg" alt="" class="user-image" />
              <span class="messages">
                <b>Rachel Greene </b> posted 2 comments on your photo.
          
              </span>
            </a>
          </li>
          <li class="list__item">
            <a href="#" class="list__item--link">
              <img src="https://cdn.tutsplus.com/net/uploads/legacy/213_chris/ChrisThumbnail.jpg" alt="" class="user-image" />
              <span class="messages">
                <b>Joey Tribiani </b> commented on your last video.
              </span>
            </a>
          </li>
        </ul>
      </div> <!-- bell-icon-->
    <i class="fa fa-envelope-o small-icon"></i>


  </div> <!--  header__notification -->
  
  <div class="header__profile">
    <div class="profile__photo"></div>
    <div class="fa fa-arrow-circle-o-down"></div>
  </div>
</div>

<section>
<img src="https://cdn.shopify.com/s/files/1/0969/9128/products/1500_dc2d3f32-f112-40a5-973b-49e0fae7b615_large.jpg?v=1480327954" alt="Mountain Image" width="400px" />
  </section>
<ul class="checklist">
	<li>The bell show number of new notifications (unread ones).</li>
	<li>Clicking on bell should show the dropdown with a nice animation and clicking again or clicking outside should close it.</li>
	<li>On opening the dropdown the new notification count  reset to 0.
</li>
	<li>The front-end keeps calling a function at random intervals, which returns random notification strings for new notification.
</li>
</ul>








<script>


var bellIcon = document.querySelector('.bell-icon');
    var dropdownMenu = document.querySelector('.dropdown');
    var notificationNumber = document.getElementsByClassName('notification-number');
    var timeDelay = [1000,2000,3000,4000,5000,6000];
    function randomNumber(){
      var random = Math.floor(Math.random() * 6);
      for(var i = 0; i < notificationNumber.length;i++){
        notificationNumber[i].textContent = random;
      }
    }
    function randomRange(data) {
      var newTime = data[Math.floor(data.length * Math.random())];
      return newTime;
    }
    function bellCheck(event){
      var isClickInside = bellIcon.contains(event.target);
        if (isClickInside) {
          dropdownMenu.classList.toggle('hide');
          if(dropdownMenu.classList.contains('hide')){
            clearInterval(notificationInterval);
            notificationInterval = setInterval(randomNumber, 2000);  
          }
          else{
          for(var i = 0; i < notificationNumber.length;i++){
             notificationNumber[i].textContent = 0;
             clearInterval(notificationInterval);
          }
        }
        }
        else {
          dropdownMenu.classList.add('hide');
          clearInterval(notificationInterval);
          notificationInterval = setInterval(randomNumber, randomRange(timeDelay));
        }
    }
    var notificationInterval = setInterval(randomNumber, randomRange(timeDelay));
    window.addEventListener('click', bellCheck);
</script>
