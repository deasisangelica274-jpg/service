<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Service</title>

<style>
body{
    font-family: Arial;
    background: linear-gradient(135deg, #74ebd5, #9face6);
    text-align: center;
    min-height: 100vh;
}

h1{
    color: white;
    margin-top: 20px;
    text-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

form{
    margin: 20px auto;
    padding: 20px;
    width: 320px;
    background: rgba(255,255,255,0.9);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    backdrop-filter: blur(10px);
}

input{
    width: 90%;
    padding: 12px;
    margin: 8px;
    border-radius: 8px;
    border: none;
    outline: none;
    box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
}

button{
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    background: linear-gradient(45deg, #007bff, #00c6ff);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

button:hover{
    transform: scale(1.05);
    opacity: 0.9;
}

table{
    margin: 20px auto;
    border-collapse: collapse;
    width: 70%;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

td, th{
    padding: 12px;
    border-bottom: 1px solid #eee;
}

th{
    background: #007bff;
    color: white;
}

tr:hover{
    background: #f1f5ff;
}

#editModal{
    display:none;
    position: fixed;
    top: 25%;
    left: 50%;
    transform: translateX(-50%);
    width: 320px;
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

</style>
</head>

<body>

<h1>Service Management</h1>

<form id="service" data-id="">
    <input type="text" id="txtSdescription" placeholder="Service Description" required>
    <input type="text" id="txtFee" placeholder="Fee Per Hour" required>
    <button type="submit">Save</button>
</form>

<div id="editModal">
    <h3>Edit Service</h3>

    <input type="hidden" id="edit_id">
    <input type="text" id="edit_Sdescription"><br><br>
    <input type="text" id="edit_Fee"><br><br>

    <button onclick="updateService()">Update</button>
    <button onclick="closeEdit()">Cancel</button>
</div>

<table>
<thead>
<tr>
    <th>Description</th>
    <th>Fee</th>
    <th>Actions</th>
</tr>
</thead>
<tbody id="tb_service"></tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./js/user.js"></script>

<script>
get_service();

$("#service").submit(function(e){
    e.preventDefault();
    saveService();
});
</script>

</body>
</html>
