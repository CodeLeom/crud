<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Operation with Vue.js, PHP and MySQL</title>
    <script src="app.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>

<h1>Products</h1>
<div id='productapp'>

    <table border='1' width='100%' style='border-collapse: collapse;'>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Description</th>
        <th></th>
    </tr>

    <tr v-for='product in products'>
    <td><input type='text' v-model='p_id'></td>
    <td><input type='text' v-model='p_name'></td>
    <td><input type='text' v-model='p_price'></td>
    <td><input type='text' v-model='p_description'></td>
    <td><input type='button' value='Add' @click='addRecord();'></td>
    </tr>
    </table>

     <!-- Update/Delete -->
   <tr v-for='(product, index) in products'>
     <td><input type='text' v-model='product.p_id' ></td>
     <td><input type='text' v-model='product.p_name' ></td>
     <td><input type='text' v-model='product.p_price' ></td>
     <td><input type='text' v-model='product.p_description' ></td>
     <td><input type='button' value='Update' @click='updateRecord(index, product.p_id);'><br>
     <input type='button' value='Delete' @click='deleteRecord(index, product.p_id)'></td>
   </tr>

  </table>
 
</div>

</body>
</html>