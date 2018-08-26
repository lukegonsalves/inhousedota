<!-- 2018-03-02 23:59:00 -->
<!-- "Y-m-d H:i:s" -->
<div id="app">
  <countdown date="2018-08-27 21:15:00"></countdown>
</div>


<template>
  <div class="countdown flex uppercase align-middle text-center mx-auto text-indigo-darkest font-mono font-semibold">
    <div class="block flex flex-col mr-8 ml-8">
      <p class="digit text-5xl font-semibold">{{ days | two_digits }}</p>
      <p class="text-xs">Days</p>
    </div>
    <div class="block flex flex-col mr-8">
      <p class="digit text-5xl font-semibold">{{ hours | two_digits }}</p>
      <p class="text-xs">Hours</p>
    </div>
    <div class="block flex flex-col mr-8">
      <p class="digit text-5xl font-semibold">{{ minutes | two_digits }}</p>
      <p class="text-xs">Minutes</p>
    </div>
    <div class="block flex flex-col mr-8">
      <p class="digit text-5xl font-semibold">{{ seconds | two_digits }}</p>
      <p class="text-xs">Seconds</p>
    </div>
  </div>
</template>






<script>
export default {
  mounted() {
    window.setInterval(() => {
        this.now = Math.trunc((new Date()).getTime() / 1000);
    },1000);
  },
  props: {
    date: {
      type: String
    }
  },
  data:() => {
    return {
      now: Math.trunc((new Date()).getTime() / 1000)
    }
  },
  computed: {
    dateInMilliseconds() {
      return Math.trunc(Date.parse(this.date) / 1000)
    },
    seconds() {
      return (this.dateInMilliseconds - this.now) % 60;
    },
    minutes() {
      return Math.trunc((this.dateInMilliseconds - this.now) / 60) % 60;
    },
    hours() {
      return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60) % 24;
    },
    days() {
      return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60 / 24);
    }
  }
}

</script>