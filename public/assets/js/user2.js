Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');
var adduser2 = new Vue({

    el: "#adduser2",
  
    data: {
      user_id: [],
      firstname: [],
      lastname: [],
      email: [],
      email2: [],
      phone: [],
      address: [],
      city: [],
      country: [],
      zipcode: []
  
    },
  
    methods: {
  
        edit: function () {
  
            axios.patch('http://127.0.0.1:8000/api/patchuser2', {
                id: this.$userId,
                Firstname: this.firstname,
                Lastname: this.lastname,
                email: this.email,
                email2: this.email2,
                phone: this.phone,
                address: this.address,
                city: this.city,
                country: this.country,
                zipcode: this.zipcode,
                
              })
    
      },
  
  
    },
  
    mounted() {
        axios
        .get('http://127.0.0.1:8000/api/getuser/'+this.$userId)
        .then(response => ( 
            this.firstname = response.data.Firstname,
            this.lastname = response.data.Lastname,
            this.email = response.data.email,
            this.email2 = response.data.email2,
            this.phone = response.data.phone,
            this.address = response.data.address,
            this.city = response.data.city,
            this.country = response.data.country,
            this.zipcode = response.data.zipcode
            
))
        
    }
  
  
  });
