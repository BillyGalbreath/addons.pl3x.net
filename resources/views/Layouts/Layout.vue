<template>
    <Head>
        <title></title>
        <meta type="description" content="Blazing fast live mapping solution for Paper and friends" head-key="description"/>
        <meta name="keywords" content="minecraft, map, dynamic, pl3x, pl3xmap"/>
        <meta name="author" content="BillyGalbreath">
        <meta property="og:url" content="https://addons.pl3x.net">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ config('app.name') }}">
        <meta property="og:image" content="https://raw.githubusercontent.com/BillyGalbreath/Pl3xMap/v2/webmap/public/images/og.png">
        <meta property="og:description" content="Blazing fast live mapping solution for Paper and friends">
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:locale" content="en_US">
        <meta property="article:author" content="">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:url" content="https://addons.pl3x.net">
        <meta name="twitter:title" content="{{ config('app.name') }}">
        <meta name="twitter:description" content="Blazing fast live mapping solution for Paper and friends">
        <meta name="twitter:image" content="https://raw.githubusercontent.com/BillyGalbreath/Pl3xMap/v2/webmap/public/images/og.png">
        <meta name="darkreader-lock"/>
    </Head>
    <Drawer @closeDrawer="showDrawer=false" :showDrawer="showDrawer"/>
    <header>
        <div class="content">
            <Logo/>
            <Navigation @openDrawer="showDrawer=true"/>
        </div>
    </header>
    <div class="wrapper">
        <div class="content">
            <slot/>
        </div>
    </div>
    <footer>
        <div class="content">
            <ul>
                <li>
                    <p>Footer stuff. Yadda yadda.</p>
                </li>
                <li>
                    <p>I never know what to put down here.</p>
                </li>
            </ul>
            <div>
                <p>&copy; 2022 pl3x.net</p>
            </div>
        </div>
    </footer>
</template>

<style>
@font-face {
    font-family: 'Poppins';
    font-display: swap;
    font-style: normal;
    font-weight: 400;
    src: url('/fonts/poppins.woff2') format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC,
    U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

.container {
    display: flex;
    align-items: flex-start;
}

.no-select {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

ul {
    list-style-type: none;
}

@media (max-width: 800px) {
    .container {
        display: block;
    }
}
</style>

<style scoped>
header {
    background: var(--header-background);
    color: var(--header-text);
    border-bottom: 1px solid var(--white);
}

.animate header,
.animate footer {
    transition: var(--fast);
}

html.darkmode header {
    border-bottom: 1px solid var(--lighter);
}

header .content {
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

footer {
    flex-shrink: 0;
    background-color: var(--footer-background);
    color: var(--footer-text);
    border-top: 1px solid var(--lighter);
}

footer ul {
    display: flex;
}

footer ul li {
    width: 50%;
    text-align: center;
}

footer .content {
    min-width: 300px;
    margin: 20px auto;
    padding: 0;
}

footer .content div {
    margin: 0;
    font-size: .8rem;
    text-align: center;
}

@media (max-width: 800px) {
    footer ul {
        display: block;
    }

    footer ul li {
        width: 100%;
        padding: 20px 0;
    }

    footer .content div {
        padding-top: 20px;
    }
}
</style>

<script setup>
import Logo from "../Components/Logo.vue";
import Navigation from "../Components/Navigation.vue";
import Drawer from "../Components/Drawer.vue";

defineProps({
    darkMode: Boolean,
    showDrawer: Boolean
});
</script>
