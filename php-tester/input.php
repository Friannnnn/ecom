<style>
@import url('https://fonts.googleapis.com/css?family=Damion|Muli:400,600');
body{
  font-family: 'Muli', sans-serif;
  background: url("https://www.toptal.com/designers/subtlepatterns/patterns/geometry2.png");
}
h2 {
    font-family: 'Damion', cursive;
    font-weight: 400;
    color: #4caf50;
    font-size: 35px;
    text-align: center;
    position: relative;
}
h2:before {
    position: absolute;
    content: '';
    width: 100%;
    left: 0;
    top: 22px;
    background: #4caf50;
    height: 1px;
}
h2 i {
    font-style: normal;
    background: #fff;
    position: relative;
    padding: 10px;
}
:focus{outline: none;}

/* necessary to give position: relative to parent. */
input[type="text"]{font: 15px/24px 'Muli', sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}

:focus{outline: none;}

.col-3{float: left; width: 27.33%; margin: 40px 3%; position: relative;} /* necessary to give position: relative to parent. */
input[type="text"]{font: 15px/24px "Lato", Arial, sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}
.input-effect {
    position: relative;
}

.input-effect .effect-21 {
    width: 100%;
    padding: 10px 0;
    border: none;
    border-bottom: 1px solid #ccc;
    outline: none;
    background: transparent;
    font-size: 16px;
}

.input-effect .effect-21:focus {
    border-color: #555;
}

.input-effect label {
    position: absolute;
    top: 10px;
    left: 0;
    font-size: 16px;
    color: #aaa;
    pointer-events: none;
    transition: 0.2s ease all;
}

.input-effect .effect-21:focus ~ label,
.input-effect .effect-21:not(:placeholder-shown) ~ label {
    top: -20px;
    font-size: 12px;
    color: #555;
}

.input-effect .focus-border:before,
.input-effect .focus-border:after {
    content: "";
    position: absolute;
    bottom: 0;
    width: 0;
    height: 2px;
    background-color: #555;
    transition: 0.4s;
}

.input-effect .focus-border:before {
    left: 50%;
}

.input-effect .focus-border:after {
    right: 50%;
}

.input-effect .effect-21:focus ~ .focus-border:before,
.input-effect .effect-21:focus ~ .focus-border:after {
    width: 50%;
}

</style>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Form Input Designs onHover and onFocus</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="mahi_holder">
    <div class="container">
      <div class="row bg_1">
        <h2><i>Border effects</i></h2>
        <div class="col-3">
            <input class="effect-1" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-2" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-3" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>        
        <div class="col-3">
            <input class="effect-4" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-5" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-6" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>        
        <div class="col-3">
            <input class="effect-7" type="text" placeholder="Placeholder Text">
              <span class="focus-border">
                <i></i>
              </span>
          </div>
        <div class="col-3">
            <input class="effect-8" type="text" placeholder="Placeholder Text">
              <span class="focus-border">
                <i></i>
              </span>
          </div>
        <div class="col-3">
            <input class="effect-9" type="text" placeholder="Placeholder Text">
              <span class="focus-border">
                <i></i>
              </span>
          </div>
      </div> 
      <div class="row bg_2">
        <h2><i>Background Effects</i></h2>
        <div class="col-3">
        	<input class="effect-10" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-11" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-12" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-13" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-14" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-15" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
      </div>
      <div class="row bg_3">
        <h2><i>Input with Label Effects</i></h2>
        <div class="col-3 input-effect">
        	<input class="effect-16" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-17" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-18" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border"></span>
        </div>
        
       
        <div class="col-3 input-effect">
        	<input class="effect-21" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border">
            	<i></i>
            </span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-22" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-bg"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-23" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-bg"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-24" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-bg"></span>
        </div>
      </div>
    </div>
</div>
  
  

</body>

</html>
