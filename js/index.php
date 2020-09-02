<button onclick="pest();">max</button>


<script src="sweetalert.js"></script>
<script type="text/javascript">

	function pest(){
	swal("Do You want to book appointment?", {
  buttons: {
    
    online: {
      text: "Book ONline!",
      value: "online",
    },

    ofline:{
    	text: "Book Ofline",
    	value: "Ofline"
    },
    cancel: "Cancle!",
  },
})
.then((value) => {
  switch (value) {
 	
    case "online":
      swal("Booked!","Online appointment Booked" , "success");
      console.log(value);
      break;
 
    case "Ofline":
      swal("Booked!","Ofline Appointment booked" , "success");
       console.log(value);
      break;
 
    default:
      swal("Got away safely!");
  }
});
}
</script>