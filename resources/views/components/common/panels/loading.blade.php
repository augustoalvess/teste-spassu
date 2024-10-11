<style>
    #obscure-loading {
        display: none;
        /* Hide the DIV */
        position: fixed;
        _position: absolute;
        /* hack for internet explorer 6 */
        height: 100%;
        min-height: 100%;
        width: 100%;
        background: #000;
        z-index: 1050;
        top: 0 !important;

        background-color: rgb(0, 0, 0);
        /* RGBa with 0.6 opacity */
        background-color: rgba(0, 0, 0, 0.6);
        /* For IE 5.5 - 7*/
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
        /* For IE 8*/
        -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
        /**opacity: 0.2;*/
    }

    .contentBar {
        width: 150px; 
        display:block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20%;
        text-align: center;
    }

    .lds-ripple {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-ripple div {
        position: absolute;
        border: 4px solid #fff;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }

    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }

    @keyframes lds-ripple {
        0% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 1;
        }

        100% {
            top: 0px;
            left: 0px;
            width: 72px;
            height: 72px;
            opacity: 0;
        }
    }
</style>

<div id='obscure-loading'>
    <div class='contentBar'>
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
</div>