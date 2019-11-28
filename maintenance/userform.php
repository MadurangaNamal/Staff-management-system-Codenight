<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Form</title>
   

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/styleCopy.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div class="center">
<form  action="addjob.php" method="post">
<div class="form-group">
				<label class="input-select-head">Faculty </label>
    			<SELECT class="input-select" name="faculty" id="faculty">
					<option class="input-select" >Faculty of Applied Sciences</option>
					<option class="input-select" >Faculty of Management studies</option>
					<option class="input-select">Faculty of Geomatics</option>
					<option class="input-select">Faculty of Social Sciences and Languages</option>
					<option class="input-select">Faculty of Agricultural Sciences</option>
				
                </SELECT>  
            </div>        
  <div class="form-group">
    <input type="text" class="form-control" name="dept" placeholder="Department">
  </div>

  <div class="form-group"> 
        <label for="date">Select date</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>

    <div class="form-group">
            <input type="text" class="form-control" name="venue" placeholder="Venue">
          </div>

          <div class="form-group">
                <label for="date">Description</label>
                <textarea class="form-control rounded-0" id="des" name="description" rows="3"></textarea>
              </div>        


  <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
</form>
    <h1 id="selection"></h1>
    </div>
</body>
</html>