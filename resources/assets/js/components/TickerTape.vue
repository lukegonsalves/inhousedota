<template>

<div class="text-center py-1 lg:px-4"> <!-- "bg-indigo-darker " -->
      <div class="p-2 items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="time"> </span> 
        <transition name="fade" tag="div" mode="out-in">
          <span class="font-normal mr-2 text-left flex-auto news font-sans" href="#" v-if="news[0]" key="0">No puns, politics, religion, lyrics or smurfs! Only Dota 2.</span>
          <span class="font-normal mr-2 text-left flex-auto news font-sans" href="#" v-if="news[1]" key="1">100% Munt-verified SHITSHOWS</span>
          <a class="font-normal mr-2 text-left flex-auto news font-sans text-white hover:text-white" href="https://clips.twitch.tv/PlainCrowdedHyenaNononoCat" v-if="news[2]" key="2">That is the WORST CHRONO I've ever seen in my f**** life</a>
          <span class="font-normal mr-2 text-left flex-auto news font-sans" href="#" v-if="news[3]" key="3">You BALT F***</span>
          <span class="font-normal mr-2 text-left flex-auto news font-sans" href="#" v-if="news[4]" key="4">Warning: Choccy</span>

        </transition>
      </div>
</div>



</template>




<script>
export default {
    data:() => {
        return {
    tickerLocation: 0,
    news: [
      true,
      false,
      false,
      false,
      false,
    ]
    }
  },
  created: function() {
    setInterval(this.updateTicker, 3000);
  },
  methods: {
    updateTicker: function() {
      var removed = this.news.pop();
      this.news.unshift(removed);
    }
  }
}
</script>