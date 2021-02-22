<?php // เปิดหัวประกาศคำสั่งphp
session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
if (!isset($_SESSION['id'])) { // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true 
  $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
}
if (isset($_GET['logout'])) { // เงื่อนไข if ถ้า มี $_GET['logout'] จะทำให้เงื่อนไขนี้เป็นจริง true
  session_destroy();
  unset($_SESSION['id']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['id']
  unset($_SESSION['type']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['type']
  header('location: index.php'); // การ route ไปยัง index.php
}
if ($_GET['id']) {
  include('../../configure/connect.php');
  $sql = "SELECT DISTINCT * 
            From users 
            inner join requestcompany 
            on users.id = requestcompany.r_sid 
            inner join grade
            on requestcompany.r_sid = grade.g_id
            WHERE users.id = ?";
  if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    $param_id = trim($_GET['id']);
    if (mysqli_stmt_execute($stmt)) {
      $result = mysqli_stmt_get_result($stmt);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['id'];
      } else {
        echo "else";
        // header("locatino: index.")
      }
    }
  }
}
?>
<html lang="th"> //กำหนดภาษาของหน้าเว็บไซต์
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> //กำหนด stylesheet css ของหน้าเว็บไซต์
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์
<head>
  <meta charset="utf-8" /> // กำหนดรูปแบบภาษาไทย
  <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title> // ชื่อที่แสดงส่วนบนหัวเว็บไซต์
  <!-- <link rel="stylesheet" href="../../scr/css/styles.css"> -->
  <link rel="stylesheet" type="test/css" href="../../scr/css/print.css" media="print">
</head>
<body>
  <div class="row">
    <div class="rightcolumn">
      <div class="card2-from-admin-read" style='padding:0px' ;>
        <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
          <a href="adminpage.php">
            <img src="../../scr/img/rsuhead.jpg" width="100%" style='padding: 10px;'>
          </a>
        </div>
        <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
          <div class="form-group col-md-3">
          </div>
          <div class="form-group col-md-5" style='margin-top:60px' ;>
          </div>
        </div>
        <form action="../../process/admin-update-status_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/admin-update-status_db.php
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-1">
            </div>
            <div class="form-group col-md-3">
              ที่ วศ.130/2562
            </div>
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-3">
              วิทยาลัยวิศวกรรมศาสตร์
            </div>
          </div>
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-2">
              <input class="form-control" id="input" name="g_class" style='border: none' ; width="10px" placeholder="กรอก">
            </div>
          </div>
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-1">
            </div>
            <div class="form-group" style='margin-right: 20px;'>
              เรื่อง
            </div>
            <div class="form-group col-md-4">
              ขอความอนุเคราะห์พิจารณานักศึกษาเข้าฝึกงาน
            </div>

          </div>
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-1">
            </div>
            <div class="form-group" style='margin-right: 20px; margin-top:25px' ;>
              เรียน
            </div>
            <div class="form-group col-md-2" style='margin-top:20px' ;>
              <input class="form-control" id="input" name="g_class" style='border: none' ; width="10px" placeholder="กรอก">
            </div>
            <div class="form-group col-md-4">
              <?php echo "<br>" . $row['r_company']; ?>
            </div>
          </div>
          <div class="form-row" style='margin-top:0px'>
            <div class="form-group col-md-1">
            </div>
            สิ่งที่ส่งมาด้วย ใบตอบรับ
          </div>
          <div class="form-row" style='margin-top:40px'>
            <div class="form-group col-md-2">
            </div>
            <div class="form-group" ;>
              เนื่องด้วย วิทยาลัยวิศวกรรมศาสตร์ มหาวิทยาลัยรังสิต มีความจำเป็นในการจัดหาสถานที่ฝึกงาน ให้แก่นักศึกษาชั้นปีที่ 4 ขึ้นไป โดยมีช่วงเวลาฝึกงานระหว่าง
            </div>
          </div>
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-1">
            </div>
            <div class="form-group" ;>
              วันที่ 1 มิถุนายน – 31 กรกฎาคม 2563 การฝึกงานถือเป็นวิชาหนึ่งในหลักสูตรของวิทยาลัยฯ เพื่อเปิดโอกาสให้นักศึกษา หาประสบการณ์และทักษะในการทำงาน เตรียมตัวที่จะเป็นวิศวกร
            </div>
          </div>
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-1">
            </div>
            <div class="form-group" ;>
              และนักเทคโนโลยีที่ดีต่อไป วิทยาลัยฯ ได้พิจารณาเห็นว่าองค์กรของท่านดำเนินกิจการ ทางด้านวิศวกรรมและเทคโนโลยีที่มีศักยภาพ วิทยาลัยฯ จึงใคร่ขอความอนุเคราะห์พิจารณานักศึกษา
            </div>
          </div>
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-1">
            </div>
            <div class="form-group" ;>
              เพื่อเข้ารับการฝึกงาน ดังนี้
            </div>
          </div>
          <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-1">
            </div>
          </div> -->
          <div class="form-group col-md-1" style='margin-top:-10px' ;>
          </div>
          <div class="form-group col-md-1" style='margin-top:-10px' ;>
          </div>
          <div class="form-group" style='margin-right:5px;'>
          </div>
          <div class="form-group col-md-1" style='margin-top:-10px' ;>
          </div>
          <div class="form-group col-md-1" style='margin-top:-10px' ;>
          </div>
          <div class="form-group" style='margin-right:5px;'>
          </div>
          <div class="form-group col-md-1" style='margin-top:-10px' ;>
            <input class="form-control" style='border: none' ; id="input" name="g_class" width="10px" placeholder="">
          </div>
      </div>
      <div class="form-row" style='margin-top:0px' ;>
        <div class="form-group col-md-2">
        </div>
        <div class="form-group" style='margin-right:10px;'>
          <?php echo $row['name_titles']; ?> // แสดงต่า $row['name_titles']
        </div>
        <div class="form-group" style='margin-right:30px;'>
          <?php echo $row['f_name']; ?> // แสดงต่า $row['f_name']
        </div>
        <div class="form-group" style='margin-right:30px;'>
          <?php echo $row['l_name']; ?> // แสดงต่า $row['l_name']
        </div>
        <div class="form-group" style='margin-right:30px;'>
          รหัส
        </div>
        <div class="form-group" style='margin-right:30px;'>
          <?php echo $row['id']; ?> // แสดงต่า $row['id']
        </div>
        <div class="form-group" style='margin-right:30px;'>
          ภาควิชา
        </div>
        <div class="form-group" style='margin-right:30px;'>
          <?php
          $major = $row['major'];
          switch ($major) {
            case "cen":
              $majorName = 'วิศวกรรมโยธา';
              break;
            case "che":
              $majorName = 'วิศวกรรมเคมี';
              break;
            case "env":
              $majorName = 'วิศวกรรมสิ่งแวดล้อม';
              break;
            case "aen":
              $majorName = 'วิศวกรรมยานยนต์';
              break;
            case "een":
              $majorName = 'วิศวกรรมไฟฟ้า';
              break;
            case "ien":
              $majorName = 'วิศวกรรมอุตสาหการ';
              break;
            case "men":
              $majorName = 'วิศวกรรมเครื่องกล';
              break;
            case "cpe":
              $majorName = 'วิศวกรรมคอมพิวเตอร์';
              break;
            default:
              $majorName = 0;
          }
          echo  $majorName;
          ?>
        </div>
      </div>
      <div class="form-row" style='margin-top:40px'>
        <div class="form-group col-md-2">
        </div>
        <div class="form-group" ;>
          อนึ่ง หากท่านสามารถรับนักศึกษาเข้าฝึกงานได้ หรือขัดข้องประการใด โปรดแจ้งกลับตามเอกสารใบตอบรับ
          ที่แนบมา จักเป็นพระคุณอย่างสูง
        </div>
      </div>
      <div class="form-row" style='margin-top:40px'>
        <div class="form-group col-md-2">
        </div>
        <div class="form-group" ;>
          วิทยาลัยวิศวกรรมศาสตร์ มหาวิทยาลัยรังสิต หวังในความอนุเคราะห์จากท่านเป็นอย่างยิ่งและขอขอบพระคุณ
          มา ณ โอกาสนี้
        </div>
      </div>
      <div class="form-row" style='margin-top:50px' ;>
        <div class="form-group col-md-1" style='margin-right:80px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:30px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:30px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:30px;'>
          จึงเรียนมาเพื่อโปรดทราบ
        </div>
      </div>
      <div class="form-row" style='margin-top:50px' ;>
        <div class="form-group col-md-1" style='margin-right:80px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:30px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:30px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:60px;'>
          <div style='margin-right:60px;'>
          </div>
        </div>
      </div>
      <div class="form-row" style='margin-top:0px' ;>
        <div class="form-group col-md-1" style='margin-right:80px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:30px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:20px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:10px;'>
          <input class="form-control" style='border: none' ; id="input" name="g_class" width="10px" placeholder="ชื่อ นาม-สกุล">
        </div>
      </div>
      <div class="form-row" style='margin-top:0px' ;>
        <div class="form-group col-md-1" style='margin-right:80px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:30px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:20px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:10px;'>
          <input class="form-control" style='border: none' ; id="input" name="g_class" width="10px" placeholder="ตำแหน่ง">
        </div>
      </div>
      <div class="form-row" style='margin-top:300px ' ;>
        <div class="form-group col-md-1" style='margin-right:ถ0px;'>
        </div>
        <div class="form-group col-md--" style='margin-right:30px;'>
          สำนักงานวิทยาลัยวิศวกรรมศาสตร์
        </div>
        <div class="form-group col-md-2" style='margin-right:20px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:10px;'>
        </div>
      </div>
      <div class="form-row" style='margin-top:0px' ;>
        <div class="form-group col-md-1" style='margin-right:ถ0px;'>
        </div>
        <div class="form-group col-md--" style='margin-right:30px;'>
          โทรศัพท์ 0-29972222-30 ต่อ 3221 โทรสาร 02-9972222-30 ต่อ 3230
        </div>
        <div class="form-group col-md-2" style='margin-right:20px;'>
        </div>
        <div class="form-group col-md-2" style='margin-right:10px;'>
        </div>
      </div>
      <?php
      if ($row['g_subject3'] !== '') {
        echo "<td>" . $row['g_subject3'] . "</td>";
        echo "<td>" . $row['g_term3'] . '/' . $row['g_year3'] . "</td>";
        echo "<td>" . $row['g_gpa3'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row['g_subject2'] . "</td>";
        echo "<td>" . $row['g_term2'] . '/' . $row['g_year2'] . "</td>";
        echo "<td>" . $row['g_gpa2'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row['g_subject1'] . "</td>";
        echo "<td>" . $row['g_term1'] . '/' . $row['g_year1'] . "</td>";
        echo "<td>" . $row['g_gpa1'] . "</td>";
      } else if ($row['g_subject2'] !== '') {
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row['g_subject2'] . "</td>";
        echo "<td>" . $row['g_term2'] . '/' . $row['g_year2'] . "</td>";
        echo "<td>" . $row['g_gpa2'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row['g_subject1'] . "</td>";
        echo "<td>" . $row['g_term1'] . '/' . $row['g_year1'] . "</td>";
        echo "<td>" . $row['g_gpa1'] . "</td>";
      } else if ($row['g_subject1'] !== '') {
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row['g_subject1'] . "</td>";
        echo "<td>" . $row['g_term1'] . '/' . $row['g_year1'] . "</td>";
        echo "<td>" . $row['g_gpa1'] . "</td>";
      }
      ?>
      </tbody>
      </table>
      <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
        <div class="form-group col-md-4">
          <label for="inputEmail4">ชื่อหน่วยงาน/บริษัท ที่ประสงค์จะฝึกงาน</label>
          ?php echo "<br>" . $row['r_company'] ; ?>
        </div>
      </div>
      <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
        <div class="form-group col-md-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              สำนักงานวิทยาลัยวิศวกรรมศาตร์จัดหาให้
            </label>
          </div>
        </div>
        <div class="form-group col-md-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              นักศึกษาจัดหาเอง
            </label>
          </div>
        </div>
      </div>
      <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
        <div class="form-group col-md-4">
          <label for="inputEmail4">ตำแหน่งหรือชื่อบุคคลที่ติดต่อ</label>
          ?php echo "<br>" . $row['r_about'] ; ?>
        </div>
      </div>
      <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
        <div class="form-group col-md-2">
          <label for="inputEmail4">เลขที่</label>
          ?php echo "<br>" . $row['r_address'] ; ?>
        </div>
        <div class="form-group col-md-2">
          <label for="inputPassword4">หมู่</label>
          ?php echo "<br>" . $row['r_mu'] ; ?>
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">ถนน</label>
          ?php echo "<br>" . $row['r_road'] ; ?>
        </div>
        <div class="form-group col-md-3">
          <label for="inputPassword4">แขวง/ตำบล</label>
          ?php echo "<br>" . $row['r_address2'] ; ?>
        </div>
      </div>
      <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
        <div class="form-group col-md-4">
          <label for="inputEmail4">เขต/อำเภอ</label>
          ?php echo "<br>" . $row['r_city'] ; ?>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">จังหวัด</label>
          ?php echo "<br>" . $row['r_state'] ; ?>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">รหัสไปรษณีย์</label>
          ?php echo "<br>" . $row['r_zip'] ; ?>
        </div>
      </div>
      <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
        <div class="form-group col-md-2">
          <label for="inputEmail4">โทรศัพท์</label>
          ?php echo "<br>" . $row['r_phone'] ; ?>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">โทรสาร</label>
          ?php echo "<br>" . $row['r_fax'] ; ?>
        </div>
      </div> -->
    </div>
    </form>
  </div>
  </div>
  <div class="conteiner">
    <div class="footer">
      <div class="fakeimg">
      </div>
    </div>
    <form action="../../process/admin-update-status_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/admin-update-status_db.php
      <?php echo  "<input type='hidden' id='txt_id' name='id' value='$row[id]'>";
      echo  "<input type='hidden' id='txt_id' name='_id' value='$_SESSION[id]'>"; ?>
      <input button type='submit' class='btn btn-warning' name='update-status' value='print1' style='margin-top:100px;' />
    </form>
  </div>
</body>

</html>