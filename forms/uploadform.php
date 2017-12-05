<?php

if(isset($_POST['submit']))
{
    $name = $_FILES['file']['name'];
    $extension = strtolower(substr($name, strpos($name,'.')+1));
    $type = $_FILES['file']['type'];
    $tmp_name= $_FILES['file']['tmp_name'];
    $user_id2=$_SESSION['user_id'];
    $pdf_topic=mysql_real_escape_string($conn,$_POST['pdf_topic']);
    $subject_id=mysql_real_escape_string($conn,$_POST['subject_id']);
    if(isset($name) && isset($pdf_topic) && isset($subject_id))
    {
        if(!empty($name)&&!empty($pdf_topic)&&!empty($subject_id))
        {
            if($extension=='pdf' && $type =='application/pdf')
            {
                $location='pdfstore/';
                if(move_uploaded_file($tmp_name, $location.$name))
                {
                    $query = "INSERT INTO `pdffile` VALUES('', '$user_id2', '$subject_id', '$location$name', '$pdf_topic') ";
                    if($query_run = mysql_query($conn,$query)){
                    echo "<span style='color: black'>File Added Sucessfully.</span>";
                    echo '<a href="profilepage.php" style="color: red;">Click here to go back.</a>';
                    }
                    else{
                        echo "<h4><span style='color:black'>Sorry We couldn't save your data at this time. Try again Later</span></h4><br>";
                    }

                }
                else{
                    echo "<span style='color:black'>There was an error.</span>";
                }
            }
            else{
                echo "<span style='color:black'>The file must be a pdf file(<8MB).</span>";
           }
        }
        else {
            echo "<span style='color:black'>Please Fill all the fields.</span>";
        }
    }
}
?>
                <form action="profilepage.php" method="POST" enctype="multipart/form-data" id="upload" class="form-inline">
                    <span style="color:black;">
                    Name<span style="padding:0px 0px 0px 10px"><input type="text" name="pdf_topic" id="pdf_topic" placeholder="Enter name of the topic" style="color:black; background-color: white;"></span><br>
                    <span>Choose a code for the subject</span><br>
                    <ul>
                    <li>Enter <span style="color:green">1</span> for Computer Networks</li>
                    <li>Enter <span style="color:green">2</span> for Operating System</li>
                    <li>Enter <span style="color:green">3</span> for Software Engineering</li>
                    <li>Enter <span style="color:green">4</span> for Principles of Managament</li>
                    <li>Enter <span style="color:green">5</span> for Automata Theory</li>
                    </ul>
                    </span>
                    <input type="text" name="subject_id" id="subject_id" placeholder="Enter Subject Code." style="color:black; background-color: white">
                    <br>
                    <input type="file" name="file" id="file" value="Choose file"><br>
                    <button type="submit" class="btn btn-success" name="submit" value="Upload" id="submit">Upload</button>
                    <span style="padding: 0px 0px 0px 10px"></span>
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="cancel">Cancel</button>
                </form>
