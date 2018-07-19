$(function () {
   $("#btnNew").on('click', function () {
       var studentName=$("#studentName").val();
       var course_id=$("#course_id").val();
       var student_payment=$("#student_payment").val();
       var ctime_id=$('#ctime_id').val();


       
      $.ajax({
           type: 'get',
           url : 'newStudent',
           data : {studentName:studentName, student_payment:student_payment, course_id:course_id, ctime_id:ctime_id},
           success:function (msg) {
               $("#successInfo").html(msg);
               if(msg==="<li class='alert alert-success'>The new student have been successfully added.</li>"){
                   $("#studentName").val('');
                   $("#payment").val('');
                   $("#course_id").val('');

               }
           }
       });

   });
});