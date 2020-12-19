var app = new Vue({
    el: '#productapp',
    data: {
      productID: "",
      productName: "",
      productPrice: "",
      productDescription: ""
    },
    methods: {
     allRecords: function(){
       axios.post('ajax.php', {
         request: 1
       })
       .then(function (response) {
         app.products = response.data;
       })
       .catch(function (error) {
         console.log(error);
       });
   
     },
     addRecord: function(){
  
       if(this.p_id != '' && this.p_name != '' && this.p_price != '' && this.p_description != ''){
         axios.post('ajax.php', {
           request: 2,
           p_id: this.productID,
           p_name: this.productName,
           p_price: this.productPrice,
           p_description: this.productDescription
         })
         .then(function (response) {
  
           // Fetch records
           app.allRecords();
  
           // Empty values
           app.productID = '';
           app.productName = '';
           app.productPrice = '';
           app.productDescription = '';

           alert(response.data);
         })
         .catch(function (error) {
           console.log(error);
         });
       }else{
         alert('No data, Kindly fill.');
       }
   
     },
     updateRecord: function(index,id){
  
       // Read value from Table
       var productName = this.products[index].p_name;
       var productPrice = this.products[index].p_price;
       var productDescription = this.products[index].p_description;

  
       if(p_name !='' && p_price !='' && p_description !=''){
         axios.post('ajax.php', {
           request: 3,
           productID: p_id,
           productName: p_name,
           productPrice: p_price,
           productDescription: p_description
         })
         .then(function (response) {
           alert(response.data);
         })
         .catch(function (error) {
           console.log(error);
         });
       }
     },
     deleteRecord: function(index,p_id){
   
       axios.post('ajax.php', {
         request: 4,
         productID: p_id
       })
       .then(function (response) {
  
         // Remove index from users
         app.users.splice(index, 1);
         alert(response.data);
       })
       .catch(function (error) {
         console.log(error);
       });
   
      } 
    },
    created: function(){
      this.allRecords();
    }
  });