<template>
  <div class="account">
      <h1 class="title mb-3">Account</h1>
     
        <v-card
            color="blue-grey darken-1"
            dark
        >
            <template v-slot:progress>
            <v-progress-linear
                absolute
                color="green lighten-3"
                height="4"
                indeterminate
            ></v-progress-linear>
            </template>
            <v-img
            height="200"
            src="https://cdn.vuetifyjs.com/images/cards/dark-beach.jpg"
            >
            <v-row>
                <v-row
                class="pa-4"
                align="center"
                justify="center"
                >
                <v-col class="text-center">
                    <h3 class="headline mt-5">
                    {{ user.name }}
                    </h3>
                    <span class="grey--text text--lighten-1">{{ user.email }}</span>
                </v-col>
                </v-row>
            </v-row>
            </v-img>
            <v-form>
            <v-container class="mt-5">
                <v-row>
                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    :disabled="isUpdating"
                    v-model="user.name"
                    filled
                    color="blue-grey lighten-2"
                    label="Name"
                    ></v-text-field>
                </v-col>
                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="user.email"
                    :disabled="isUpdating"
                    filled
                    color="blue-grey lighten-2"
                    label="Email"
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="user.roles"
                    filled
                    color="blue-grey lighten-2"
                    label="Role"
                    ></v-text-field>
                </v-col>
                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="user.author"
                    filled
                    color="blue-grey lighten-2"
                    label="Author"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                    v-model="user.quote"
                    filled
                    color="blue-grey lighten-2"
                    label="Quote"
                    ></v-text-field> 
                </v-col>
                </v-row>
            </v-container>
            </v-form>
            <v-divider></v-divider>
            <v-card-actions>
            
            <v-spacer></v-spacer>
            <v-btn
                color="blue-grey darken-3"
                depressed
                @click="isUpdating = true"
            >
                <v-icon left>
                mdi-update
                </v-icon>
                Update Now
            </v-btn>
            <v-btn
                color="blue-grey darken-3"
                depressed
                @click="deleteAccount(user.id)"
            >
                <v-icon left>
                mdi-trash-can-outline
                </v-icon>
                Delete Account
            </v-btn>
            </v-card-actions>
      </v-card>
  </div>
</template>

<script>
  export default {
    data () {
      const srcs = {
        1: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
        2: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
        3: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
        4: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
        5: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
      }

      return {
        autoUpdate: true,
        friends: ['Sandra Adams', 'Britta Holt'],
        isUpdating: false,
        user:'',
      }
    },

    watch: {
      isUpdating (val) {
        if (val) {
          setTimeout(() => (this.isUpdating = false), 3000)
        }
      },
    },

    methods: {
        remove (item) {
            const index = this.friends.indexOf(item.name)
            if (index >= 0) this.friends.splice(index, 1)
        },

        getLoggedUser(){
            axios.get('/api/user').then(response => {
            this.user=response.data; 
            })
            .catch(error =>{
            console.log(error);
            })
        },

        deleteAccount(id){
            axios.delete('/api/delete/'+ id)
            .then( response =>{
              window.location.href = '/unauthorized'
            })

             .catch(error =>{
            console.log(error);
            })
        },
    },

    created(){

        this.getLoggedUser();
    }
  }
</script>
