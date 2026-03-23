function saveService(){
    let id = $("#service").attr("data-id");

    let data = {
        Service_ID: id,
        Service_Description: $("#txtSdescription").val(),
        Fee_Per_Hour: $("#txtFee").val()
    };

    let url = id ? "./php/edit.php" : "./php/saved.php";

    $.post(url, data, function(res){
        alert(id ? "Updated ✅" : "Saved ✅");

        $("#service").removeAttr("data-id");
        $("#service")[0].reset();

        get_service();
    });
}


function get_service(){
    $.get("./php/display.php", function(data){

        let service = data; 
        let tableData = "";

        service.forEach(item => {
            tableData += `
            <tr>
                <td>${item.Service_Description}</td>
                <td>${item.Fee_Per_Hour}</td>
                <td>
                    <button onclick='edit_service(${item.Service_ID}, ${JSON.stringify(item.Service_Description)}, ${item.Fee_Per_Hour})'>Edit</button>
                    <button onclick="delete_service(${item.Service_ID})">Delete</button>
                </td>
            </tr>`;
        });

        $("#tb_service").html(tableData);
    });
}


function delete_service(id){
    if(confirm("Delete this service?")){
        $.post("./php/delete.php", {Service_ID: id}, function(res){
            alert(res);
            get_service();
        });
    }
}

function edit_service(id, desc, fee){
    $("#edit_id").val(id);
    $("#edit_Sdescription").val(desc);
    $("#edit_Fee").val(fee);

    $("#editModal").show();
}

function updateService(){
    let data = {
        Service_ID: $("#edit_id").val(),
        Service_Description: $("#edit_Sdescription").val(),
        Fee_Per_Hour: $("#edit_Fee").val()
    };

    $.post("./php/edit.php", data, function(res){
        alert("Updated successfully ✅");
        closeEdit();
        get_service();
    });
}

function closeEdit(){
    $("#editModal").hide();
}
