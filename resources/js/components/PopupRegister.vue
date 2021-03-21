<template>
  <div class="text-center">
    <v-menu
      v-model="menu"
      :close-on-content-click="false"
      :nudge-width="200"
      offset-y
    >
      <template v-slot:activator="{ on, attrs }"> 

        <v-btn 
        depressed 
        small 
        text 
        v-bind="attrs"
        v-on="on"
        >
          <span id="name" class="mr-1">Register</span>
          <v-icon>mdi-account-multiple-plus</v-icon>
        </v-btn>

      </template>

      <v-card
          id="main"
          elevation="24"
          class="text-xs-center"
        >
            <v-form
            ref="form"
            v-model="valid"
            lazy-validation
            >
            <br/>
            <h4 id="title" class="title ml-3">Login</h4>

            <v-text-field
            small
            class="ml-2 mr-5"
            v-model="name"
            prepend-icon="mdi-face"
            :rules="nameRules"
            label="Name"
            required
            ></v-text-field>


            <v-text-field
              small
              class="ml-2 mr-5"
              v-model="email"
              prepend-icon="mdi-email-outline"
              :rules="emailRules"
              label="E-mail"
              required
            ></v-text-field>

            <v-text-field
              small
              class="ml-3 mr-5"
              v-model="password"
              prepend-icon="mdi-key"
              type="password"
              :rules="passwordRules"
              label="Password"
              required
            ></v-text-field>

            <v-alert
              small
              dismissible
              icon="mdi-alert-outline"
              v-if="errors.data"
              type="warning"
            >{{errors.data.message}}</v-alert>

            <v-divider></v-divider>
            <v-spacer></v-spacer>

            <v-btn
              id="sub"
              class="m-4"
              icon
              color="green accent-2"
              v-on:click="register"
            >
              <v-icon>mdi-send</v-icon>
            </v-btn>

          </v-form>
      </v-card>
    </v-menu>
  </div>
</template>

<script>
  export default {
    data: () => ({
      valid: true,
      menu: false,
            errors: [],
            
            name: '',
            nameRules: [
                v => !!v || 'Name is required',
            ],
         
            email: '',
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
            password: '',
            passwordRules: [
                v => !!v || 'Password is required',
                v => (v && v.length >= 6) || 'Password must be more than 6 characters',
            ],          
        
    }),

    methods:{

        register(){

             const project = {
                name: this.name,
                email: this.email,
                password: this.password,
             }
            
             this.$emit('register', project)
             this.$refs.form.reset()
        }
    }
  }
</script>

<style scoped>
#sub{
  margin-left: 85% !important ;
}
.v-text-field label {
    font-size: 0.7em !important;
  }

</style>