<template>
    <div v-if="message!=''" class="row">
            <div class="col-12 ">
            <div class="alert alert-success">
                {{getMessage()}}
            </div>
        </div>
    </div>
</template>
<script>
export default {
 name: "SuccessComponent",
 props: {
    message: {
        type: String,
    },
 },
methods: {
    getMessage(){
        return moment().format("DD/MM/YY HH:mm") + this.message;
    }
},
}
</script>
