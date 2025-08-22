$(document).ready(function(){

    $('#emp_id').select2();
    $('#suc_id').select2();

    $.post("/Personal_CompraVenta/controller/empresa.php?op=combo",{com_id:1},function(data){
        $("#emp_id").html(data);
    });

    $("#emp_id").change(function(){
        $("emp_id").each(function(){
            emp_id = $(this).val();
           
            $.post("/Personal_CompraVenta/controller/sucursal.php?op=combo",{emp_id:emp_id},function(data){
                 $("#suc_id").html(data);
            });
        });
    });
});

