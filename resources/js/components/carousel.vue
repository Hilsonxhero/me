<template>
    <div class="swiper" ref="test">
        <div class="swiper-wrapper">
            <slot />
        </div>

        <!-- <div
            ref="pagination"
            class="swiper-pagination position-relative mt-5"
        ></div> -->
    </div>
</template>
<script>
import Swiper from "swiper";
// import 'swiper/swiper-bundle.css';

import "swiper/css";

import SwiperCore, { Navigation } from "swiper/core";

SwiperCore.use([Navigation]);

export default {
    props: {
        // next: {
        //     type: String,
        //     required: true,
        // },
        options: {
            type: Object,
            required: true,
        },
    },
    name: "carousel",
    data: () => ({
        // items: [
        //   {img: require('../assets/img/banner/restfull-lara.jpg')}
        // ]
    }),
    components: {
        Swiper,
    },
    mounted() {
        new Swiper(this.$refs.test, this.options);
    },
};
</script>

<style>
.slider {
    overflow: hidden;
}
* {
    user-select: none;
}

.swiper-button-next:after,
.swiper-container-rtl .swiper-button-prev:after,
.swiper-button-prev:after,
.swiper-container-rtl .swiper-button-next:after {
    content: unset !important;
}

.swiper-button-next,
.swiper-button-prev {
    top: 12px !important;
    background-image: unset !important;
    margin: unset !important;
    width: unset !important;
    height: unset !important;
    font-size: 24px;
    text-align: center;
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    align-items: center;
}

.swiper-button-prev {
    left: 60px !important;
}
</style>
