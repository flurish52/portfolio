

<template>
    <div

    >
        <LeaveAReply
            @toggle="toggle"

            :class="{hide: isHidden, show : !isHidden}"
        />
            <NavBar />
        <div class="px-4 md:px-12 relative">
            <slot     >

            </slot>
        </div>
        <LeaveAReviewButton
      @toggle="toggle"
        />
        <Footer />
    </div>
</template>

<script setup>
import {ref} from "vue";
import NavBar from "@/Components/NavBar.vue";
import Footer from "@/Components/Footer.vue";
import LeaveAReviewButton from "@/Components/LeaveAReviewButton.vue";
import LeaveAReply from "@/Components/LeaveAReply.vue";
let isHidden = ref("hidden")
let toggle = () =>{
    isHidden.value = !isHidden.value
}


</script>


<style scoped>
.show{
    display: flex;
}

.hide{
    display: none;
}

</style>

