<template>
    <div class="flex" >
        <input :type="show ? 'text' : 'password' " name="password" placeholder="password..."
               minLength="6" maxlength="20" required="required">

        <input type="checkbox" v-model="show"/>


        <a type="button">
            <i class="material-icons">visibility_off</i>
        </a>



    </div>
</template>

<script>
    export default {

        data(){
            return{
                show: false,
            }
        },
    }
</script>