var vrc1 = new Vue({

    el: "#addnewroom",
  
    data: {
      name: [],
      maxtemperature: -100,
      maxhumidity: -100,
      user_id: []
  
    },
  
    methods: {
  
      creatroom: function (id) {
        axios.post('api/createroom', {
  
          name: this.name,
          maxtemperature: this.maxtemperature,
          maxhumidity: this.maxhumidity,
          user_id: id,
        })
      },
    }
  });



//   *************************************************************************************************
var vrc2 = new Vue({

    el: "#getuserrooms",
    data: {
      rooms: [],
      tt: 0
    },
  
    methods: {
        pass: function(id){

           
            alert("this is pass function" + id)
        }
    },
  
    mounted() {
    //   axios
    //     .get('api/getallrooms')
    //     .then(response => (this.rooms = response.data))
    }
  
  
  });