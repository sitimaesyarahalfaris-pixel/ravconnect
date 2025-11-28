<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAVCONNECT - eSIM Global Roaming anti ribet</title>
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .184 86.047);--color-yellow-600:oklch(.681 .162 75.834);--color-yellow-700:oklch(.554 .135 66.442);--color-yellow-800:oklch(.476 .114 61.907);--color-yellow-900:oklch(.421 .095 57.708);--color-yellow-950:oklch(.286 .066 53.813);--color-lime-50:oklch(.986 .031 120.757);--color-lime-100:oklch(.967 .067 122.328);--color-lime-200:oklch(.938 .127 124.321);--color-lime-300:oklch(.897 .196 126.665);--color-lime-400:oklch(.841 .238 128.85);--color-lime-500:oklch(.768 .233 130.85);--color-lime-600:oklch(.648 .2 131.684);--color-lime-700:oklch(.532 .157 131.589);--color-lime-800:oklch(.453 .124 130.933);--color-lime-900:oklch(.405 .101 131.063);--color-lime-950:oklch(.274 .072 132.109);--color-green-50:oklch(.982 .018 155.826);--color-green-100:oklch(.962 .044 156.743);--color-green-200:oklch(.925 .084 155.995);--color-green-300:oklch(.871 .15 154.449);--color-green-400:oklch(.792 .209 151.711);--color-green-500:oklch(.723 .219 149.579);--color-green-600:oklch(.627 .194 149.214);--color-green-700:oklch(.527 .154 150.069);--color-green-800:oklch(.448 .119 151.328);--color-green-900:oklch(.393 .095 152.535);--color-green-950:oklch(.266 .065 152.934);--color-emerald-50:oklch(.979 .021 166.113);--color-emerald-100:oklch(.95 .052 163.051);--color-emerald-200:oklch(.905 .093 164.15);--color-emerald-300:oklch(.845 .143 164.978);--color-emerald-400:oklch(.765 .177 163.223);--color-emerald-500:oklch(.696 .17 162.48);--color-emerald-600:oklch(.596 .145 163.225);--color-emerald-700:oklch(.508 .118 165.612);--color-emerald-800:oklch(.432 .095 166.913);--color-emerald-900:oklch(.378 .077 168.94);--color-emerald-950:oklch(.262 .051 172.552);--color-teal-50:oklch(.984 .014 180.72);--color-teal-100:oklch(.953 .051 180.801);--color-teal-200:oklch(.91 .096 180.426);--color-teal-300:oklch(.855 .138 181.071);--color-teal-400:oklch(.777 .152 181.912);--color-teal-500:oklch(.704 .14 182.503);--color-teal-600:oklch(.6 .118 184.704);--color-teal-700:oklch(.511 .096 186.391);--color-teal-800:oklch(.437 .078 188.216);--color-teal-900:oklch(.386 .063 188.416);--color-teal-950:oklch(.277 .046 192.524);--color-cyan-50:oklch(.984 .019 200.873);--color-cyan-100:oklch(.956 .045 203.388);--color-cyan-200:oklch(.917 .08 205.041);--color-cyan-300:oklch(.865 .127 207.078);--color-cyan-400:oklch(.789 .154 211.53);--color-cyan-500:oklch(.715 .143 215.221);--color-cyan-600:oklch(.609 .126 221.723);--color-cyan-700:oklch(.52 .105 223.128);--color-cyan-800:oklch(.45 .085 224.283);--color-cyan-900:oklch(.398 .07 227.392);--color-cyan-950:oklch(.302 .056 229.695);--color-sky-50:oklch(.977 .013 236.62);--color-sky-100:oklch(.951 .026 236.824);--color-sky-200:oklch(.901 .058 230.902);--color-sky-300:oklch(.828 .111 230.318);--color-sky-400:oklch(.746 .16 232.661);--color-sky-500:oklch(.685 .169 237.323);--color-sky-600:oklch(.588 .158 241.966);--color-sky-700:oklch(.5 .134 242.749);--color-sky-800:oklch(.443 .11 240.79);--color-sky-900:oklch(.391 .09 240.876);--color-sky-950:oklch(.293 .066 243.157);--color-blue-50:oklch(.97 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.882 .059 254.128);--color-blue-300:oklch(.809 .105 251.813);--color-blue-400:oklch(.707 .165 254.624);--color-blue-500:oklch(.623 .214 259.815);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.424 .199 265.638);--color-blue-900:oklch(.379 .146 265.522);--color-blue-950:oklch(.282 .091 267.935);--color-indigo-50:oklch(.962 .018 272.314);--color-indigo-100:oklch(.93 .034 272.788);--color-indigo-200:oklch(.87 .065 274.039);--color-indigo-300:oklch(.785 .115 274.713);--color-indigo-400:oklch(.673 .182 276.935);--color-indigo-500:oklch(.585 .233 277.117);--color-indigo-600:oklch(.511 .262 276.966);--color-indigo-700:oklch(.457 .24 277.023);--color-indigo-800:oklch(.398 .195 277.366);--color-indigo-900:oklch(.359 .144 278.697);--color-indigo-950:oklch(.257 .09 281.288);--color-violet-50:oklch(.969 .016 293.756);--color-violet-100:oklch(.943 .029 294.588);--color-violet-200:oklch(.894 .057 293.283);--color-violet-300:oklch(.811 .111 293.571);--color-violet-400:oklch(.702 .183 293.541);--color-violet-500:oklch(.606 .25 292.717);--color-violet-600:oklch(.541 .281 293.009);--color-violet-700:oklch(.491 .27 292.581);--color-violet-800:oklch(.432 .232 292.759);--color-violet-900:oklch(.38 .189 293.745);--color-violet-950:oklch(.283 .141 291.089);--color-purple-50:oklch(.977 .014 308.299);--color-purple-100:oklch(.946 .033 307.174);--color-purple-200:oklch(.902 .063 306.703);--color-purple-300:oklch(.827 .119 306.383);--color-purple-400:oklch(.714 .203 305.504);--color-purple-500:oklch(.627 .265 303.9);--color-purple-600:oklch(.558 .288 302.321);--color-purple-700:oklch(.496 .265 301.924);--color-purple-800:oklch(.438 .218 303.724);--color-purple-900:oklch(.381 .176 304.987);--color-purple-950:oklch(.291 .149 302.717);--color-fuchsia-50:oklch(.977 .017 320.058);--color-fuchsia-100:oklch(.952 .037 318.852);--color-fuchsia-200:oklch(.903 .076 319.62);--color-fuchsia-300:oklch(.833 .145 321.434);--color-fuchsia-400:oklch(.74 .238 322.16);--color-fuchsia-500:oklch(.667 .295 322.15);--color-fuchsia-600:oklch(.591 .293 322.896);--color-fuchsia-700:oklch(.518 .253 323.949);--color-fuchsia-800:oklch(.452 .211 324.591);--color-fuchsia-900:oklch(.401 .17 325.612);--color-fuchsia-950:oklch(.293 .136 325.661);--color-pink-50:oklch(.971 .014 343.198);--color-pink-100:oklch(.948 .028 342.258);--color-pink-200:oklch(.899 .061 343.231);--color-pink-300:oklch(.823 .12 346.018);--color-pink-400:oklch(.718 .202 349.761);--color-pink-500:oklch(.656 .241 354.308);--color-pink-600:oklch(.592 .249 .584);--color-pink-700:oklch(.525 .223 3.958);--color-pink-800:oklch(.459 .187 3.815);--color-pink-900:oklch(.408 .153 2.432);--color-pink-950:oklch(.284 .109 3.907);--color-rose-50:oklch(.969 .015 12.422);--color-rose-100:oklch(.941 .03 12.58);--color-rose-200:oklch(.892 .058 10.001);--color-rose-300:oklch(.81 .117 11.638);--color-rose-400:oklch(.712 .194 13.428);--color-rose-500:oklch(.645 .246 16.439);--color-rose-600:oklch(.586 .253 17.585);--color-rose-700:oklch(.514 .222 16.935);--color-rose-800:oklch(.455 .188 13.697);--color-rose-900:oklch(.41 .159 10.272);--color-rose-950:oklch(.271 .105 12.094);--color-slate-50:oklch(.984 .003 247.858);--color-slate-100:oklch(.968 .007 247.896);--color-slate-200:oklch(.929 .013 255.508);--color-slate-300:oklch(.869 .022 252.894);--color-slate-400:oklch(.704 .04 256.788);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.446 .043 257.281);--color-slate-700:oklch(.372 .044 257.287);--color-slate-800:oklch(.279 .041 260.031);--color-slate-900:oklch(.208 .042 265.755);--color-slate-950:oklch(.129 .042 264.695);--color-gray-50:oklch(.985 .002 247.839);--color-gray-100:oklch(.967 .003 264.542);--color-gray-200:oklch(.928 .006 264.531);--color-gray-300:oklch(.872 .01 258.338);--color-gray-400:oklch(.707 .022 261.325);--color-gray-500:oklch(.551 .027 264.364);--color-gray-600:oklch(.446 .03 256.802);--color-gray-700:oklch(.373 .034 259.733);--color-gray-800:oklch(.278 .033 256.848);--color-gray-900:oklch(.21 .034 264.665);--color-gray-950:oklch(.13 .028 261.692);--color-zinc-50:oklch(.985 0 0);--color-zinc-100:oklch(.967 .001 286.375);--color-zinc-200:oklch(.92 .004 286.32);--color-zinc-300:oklch(.871 .006 286.286);--color-zinc-400:oklch(.705 .015 286.067);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.442 .017 285.786);--color-zinc-700:oklch(.37 .013 285.805);--color-zinc-800:oklch(.274 .006 286.033);--color-zinc-900:oklch(.21 .006 285.885);--color-zinc-950:oklch(.141 .005 285.823);--color-neutral-50:oklch(.985 0 0);--color-neutral-100:oklch(.97 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-300:oklch(.87 0 0);--color-neutral-400:oklch(.708 0 0);--color-neutral-500:oklch(.556 0 0);--color-neutral-600:oklch(.439 0 0);--color-neutral-700:oklch(.371 0 0);--color-neutral-800:oklch(.269 0 0);--color-neutral-900:oklch(.205 0 0);--color-neutral-950:oklch(.145 0 0);--color-stone-50:oklch(.985 .001 106.423);--color-stone-100:oklch(.97 .001 106.424);--color-stone-200:oklch(.923 .003 48.717);--color-stone-300:oklch(.869 .005 56.366);--color-stone-400:oklch(.709 .01 56.259);--color-stone-500:oklch(.553 .013 58.071);--color-stone-600:oklch(.444 .011 73.639);--color-stone-700:oklch(.374 .01 67.558);--color-stone-800:oklch(.268 .007 34.298);--color-stone-900:oklch(.216 .006 56.043);--color-stone-950:oklch(.147 .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1/.75);--text-sm:.875rem;--text-sm--line-height:calc(1.25/.875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75/1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75/1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2/1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5/2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a,0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a,0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0,0,.2,1)infinite;--animate-pulse:pulse 2s cubic-bezier(.4,0,.6,1)infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16/9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4,0,.2,1);--default-font-family:var(--font-sans);--default-font-feature-settings:var(--font-sans--font-feature-settings);--default-font-variation-settings:var(--font-sans--font-variation-settings);--default-mono-font-family:var(--font-mono);--default-mono-font-feature-settings:var(--font-mono--font-feature-settings);--default-mono-font-variation-settings:var(--font-mono--font-variation-settings)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}body{line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1;color:color-mix(in oklab,currentColor 50%,transparent)}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){-webkit-appearance:button;-moz-appearance:button;appearance:button}::file-selector-button{-webkit-appearance:button;-moz-appearance:button;appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing)*0)}.-mt-\[4\.9rem\]{margin-top:-4.9rem}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing)*1)}.mb-2{margin-bottom:calc(var(--spacing)*2)}.mb-4{margin-bottom:calc(var(--spacing)*4)}.mb-6{margin-bottom:calc(var(--spacing)*6)}.-ml-8{margin-left:calc(var(--spacing)*-8)}.flex{display:flex}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/376\]{aspect-ratio:335/376}.h-1{height:calc(var(--spacing)*1)}.h-1\.5{height:calc(var(--spacing)*1.5)}.h-2{height:calc(var(--spacing)*2)}.h-2\.5{height:calc(var(--spacing)*2.5)}.h-3{height:calc(var(--spacing)*3)}.h-3\.5{height:calc(var(--spacing)*3.5)}.h-14{height:calc(var(--spacing)*14)}.h-14\.5{height:calc(var(--spacing)*14.5)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing)*1)}.w-1\.5{width:calc(var(--spacing)*1.5)}.w-2{width:calc(var(--spacing)*2)}.w-2\.5{width:calc(var(--spacing)*2.5)}.w-3{width:calc(var(--spacing)*3)}.w-3\.5{width:calc(var(--spacing)*3.5)}.w-\[448px\]{width:448px}.w-full{width:100%}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing)*0);translate:var(--tw-translate-x)var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x)var(--tw-rotate-y)var(--tw-rotate-z)var(--tw-skew-x)var(--tw-skew-y)}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.gap-3{gap:calc(var(--spacing)*3)}.gap-4{gap:calc(var(--spacing)*4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing)*1)*var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing)*1)*calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing)*6)}.px-5{padding-inline:calc(var(--spacing)*5)}.py-1{padding-block:calc(var(--spacing)*1)}.py-1\.5{padding-block:calc(var(--spacing)*1.5)}.py-2{padding-block:calc(var(--spacing)*2)}.pb-12{padding-bottom:calc(var(--spacing)*12)}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-white{color:var(--color-white)}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.opacity-100{opacity:1}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008),0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.\!filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)!important}.filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-300{transition-delay:.3s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing)*0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing)*0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media (hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}}@media (width>=64rem){.lg\:-mt-\[6\.6rem\]{margin-top:-6.6rem}.lg\:mb-0{margin-bottom:calc(var(--spacing)*0)}.lg\:mb-6{margin-bottom:calc(var(--spacing)*6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing)*0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing)*8)}.lg\:p-20{padding:calc(var(--spacing)*20)}}@media (prefers-color-scheme:dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media (hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}}}@starting-style{.starting\:translate-y-4{--tw-translate-y:calc(var(--spacing)*4);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:translate-y-6{--tw-translate-y:calc(var(--spacing)*6);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:opacity-0{opacity:0}}}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false;initial-value:rotateX(0)}@property --tw-rotate-y{syntax:"*";inherits:false;initial-value:rotateY(0)}@property --tw-rotate-z{syntax:"*";inherits:false;initial-value:rotateZ(0)}@property --tw-skew-x{syntax:"*";inherits:false;initial-value:skewX(0)}@property --tw-skew-y{syntax:"*";inherits:false;initial-value:skewY(0)}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}
            </style>
        @endif    
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 900;
            line-height: 1.1;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
        }

        h3 {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.3;
        }

        h4 {
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.4;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            h2 {
                font-size: 2rem;
            }
        }

        .hero-gradient {
            background: linear-gradient(135deg, #FFC50F 0%, #FFD700 50%, #FFA500 100%);
        }

        .card-shadow-yellow:hover {
            box-shadow: 0 20px 60px rgba(255, 197, 15, 0.4);
        }

        .decorative-circle {
            filter: blur(80px);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 197, 15, 0.5); }
            50% { box-shadow: 0 0 40px rgba(255, 197, 15, 0.8); }
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .tilt-card {
            transform: perspective(1000px) rotateY(-5deg);
            transition: all 0.4s ease;
        }

        .tilt-card:hover {
            transform: perspective(1000px) rotateY(0deg) scale(1.05);
        }

        .diagonal-section {
            clip-path: polygon(0 5%, 100% 0, 100% 95%, 0 100%);
        }

        .blob-gradient {
            background: radial-gradient(circle at 30% 50%, rgba(255, 197, 15, 0.3), transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(255, 165, 0, 0.3), transparent 50%);
        }

        .country-card {
            position: relative;
            overflow: hidden;
        }

        .country-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 197, 15, 0.3), transparent);
            transition: left 0.5s;
        }

        .country-card:hover::before {
            left: 100%;
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }

        .price-badge {
            position: relative;
            display: inline-block;
        }

        .price-badge::after {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 15px;
            height: 15px;
            background: #FF4500;
            border-radius: 50%;
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes ping {
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .zig-zag-border {
            position: relative;
        }

        .zig-zag-border::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 10px;
            background: linear-gradient(135deg, #FFC50F 25%, transparent 25%),
                        linear-gradient(225deg, #FFC50F 25%, transparent 25%);
            background-size: 20px 20px;
            background-position: 0 0, 10px 0;
        }

        .grid-pattern {
            background-image:
                linear-gradient(rgba(255, 197, 15, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 197, 15, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>
<body class="bg-white">

    <!-- Header / Top Bar -->
    <header class="sticky top-0 z-50 bg-black/95 backdrop-blur-md border-b-4 border-[#FFC50F]">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between gap-4">
                <!-- Logo -->
                <div class="flex items-center gap-3 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-[#FFC50F] rounded-full blur-md group-hover:blur-lg transition"></div>
                        <svg class="w-10 h-10 text-[#FFC50F] relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-black text-white tracking-tight">RAV<span class="text-[#FFC50F]">CONNECT</span></span>
                </div>

                <!-- Search Bar - Desktop -->
                <div class="hidden md:flex flex-1 max-w-xl">
                    <div class="relative w-full">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input
                            type="text"
                            placeholder="Cari eSIM atau negara tujuan..."
                            class="w-full pl-12 pr-4 py-3 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white/20 transition"
                        />
                    </div>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center gap-3">
                    <button class="hidden md:flex items-center gap-2 px-5 py-2.5 text-white hover:text-[#FFC50F] transition-all border border-white/20 rounded-lg hover:border-[#FFC50F]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-semibold">Masuk</span>
                    </button>
                    <button class="hidden md:block px-5 py-2.5 bg-[#FFC50F] text-black rounded-lg hover:bg-[#FFD700] transition-all font-bold shadow-lg shadow-[#FFC50F]/50 hover:shadow-xl hover:shadow-[#FFC50F]/60">
                        Daftar
                    </button>
                    <button class="relative p-3 hover:bg-white/10 rounded-lg transition-all border border-white/20 hover:border-[#FFC50F]">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold pulse-glow">0</span>
                    </button>
                </div>
            </div>

            <!-- Mobile Search -->
            <div class="md:hidden mt-3">
                <div class="relative w-full">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input
                        type="text"
                        placeholder="Cari eSIM atau negara..."
                        class="w-full pl-12 pr-4 py-3 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white/20 transition"
                    />
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Banner - Creative Asymmetric Layout -->
    <section class="relative bg-black overflow-hidden min-h-screen flex items-center">
        <!-- Animated Background -->
        <div class="absolute inset-0 blob-gradient"></div>
        <div class="absolute top-20 right-10 w-96 h-96 bg-[#FFC50F] rounded-full decorative-circle opacity-20"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#FFD700] rounded-full decorative-circle opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-[#FFA500] rounded-full decorative-circle opacity-10"></div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 grid-pattern opacity-30"></div>

        <div class="max-w-7xl mx-auto px-4 py-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Side - Text Content -->
                <div class="space-y-8 text-white">
                    <!-- Promo Badge -->
                    <div class="inline-flex items-center gap-3 bg-gradient-to-r from-red-500 to-orange-500 px-6 py-3 rounded-full transform -rotate-2 hover:rotate-0 transition-all shadow-2xl">
                        <span class="text-3xl">🔥</span>
                        <div>
                            <div class="font-black text-sm">PROMO SPESIAL</div>
                            <div class="text-xs opacity-90">Diskon 20% untuk Pelanggan Baru!</div>
                        </div>
                    </div>

                    <div>
                        <h1 class="text-white mb-6 leading-tight">
                            Jelajahi <span class="text-[#FFC50F] inline-block transform hover:scale-110 transition-transform">Dunia</span> dengan eSIM<br/>
                            Roaming Anti <span class="relative inline-block">
                                <span class="relative z-10">Ribet!</span>
                                <span class="absolute bottom-2 left-0 w-full h-4 bg-[#FFC50F]/30 -rotate-1"></span>
                            </span>
                        </h1>
                        <p class="text-xl text-gray-300 mb-8 max-w-lg">
                            Koneksi internet <span class="text-[#FFC50F] font-bold">global di 100+ negara</span>. Aktifkan eSim dalam hitungan detik, tanpa ribet!
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <button class="group relative bg-[#FFC50F] text-black px-10 py-5 rounded-2xl font-black text-lg hover:bg-[#FFD700] transition-all shadow-2xl shadow-[#FFC50F]/50 hover:shadow-[#FFC50F]/70 hover:scale-105">
                            <span class="relative z-10">Beli Sekarang</span>
                            <div class="absolute inset-0 bg-white/20 rounded-2xl transform scale-0 group-hover:scale-100 transition-transform"></div>
                        </button>
                        <button class="px-10 py-5 rounded-2xl font-bold text-lg border-2 border-white/30 hover:border-[#FFC50F] hover:bg-white/5 transition-all">
                            Lihat Demo
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-[#FFC50F]/20 rounded-xl transform group-hover:scale-110 transition-transform"></div>
                            <div class="relative p-4 text-center">
                                <div class="text-4xl font-black text-[#FFC50F]">100+</div>
                                <div class="text-sm text-gray-400 font-semibold">Negara</div>
                            </div>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-0 bg-[#FFC50F]/20 rounded-xl transform group-hover:scale-110 transition-transform"></div>
                            <div class="relative p-4 text-center">
                                <div class="text-4xl font-black text-[#FFC50F]">50K+</div>
                                <div class="text-sm text-gray-400 font-semibold">Pengguna</div>
                            </div>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-0 bg-[#FFC50F]/20 rounded-xl transform group-hover:scale-110 transition-transform"></div>
                            <div class="relative p-4 text-center">
                                <div class="text-4xl font-black text-[#FFC50F]">4.9★</div>
                                <div class="text-sm text-gray-400 font-semibold">Rating</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Creative Image Layout -->
                <div class="relative lg:h-[600px] hidden lg:block">
                    <!-- Main Image -->
                    <div class="absolute top-0 right-0 w-4/5 h-4/5 transform rotate-3 hover:rotate-0 transition-all duration-500 group">
                        <div class="absolute inset-0 bg-[#FFC50F] rounded-3xl transform group-hover:scale-105 transition-transform"></div>
                        <img
                            src="https://images.unsplash.com/photo-1761198879998-6bb91fd6797c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0cmF2ZWwlMjBjb25uZWN0aXZpdHklMjBpbnRlcm5ldHxlbnwxfHx8fDE3NjM0MDUwNDd8MA&ixlib=rb-4.1.0&q=80&w=1080"
                            alt="Travel"
                            class="relative w-full h-full object-cover rounded-3xl shadow-2xl border-4 border-white/20"
                        />
                    </div>

                    <!-- Floating Cards -->
                    <div class="absolute bottom-10 left-0 bg-white rounded-2xl p-6 shadow-2xl transform -rotate-6 hover:rotate-0 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#FFC50F] to-[#FFA500] rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-black text-black">Instant</div>
                                <div class="text-sm text-gray-600">Aktivasi Cepat</div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute top-10 left-10 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-2xl p-5 shadow-2xl transform rotate-6 hover:rotate-0 transition-all">
                        <div class="text-center">
                            <div class="text-3xl font-black text-black">Rp 50k</div>
                            <div class="text-xs text-black/70 font-bold">Start From</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Country Coverage Section - Bento Box Style -->
    <section class="relative py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#FFC50F]/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16 relative">
                <div class="inline-block mb-4">
                    <span class="bg-[#FFC50F] text-black px-6 py-2 rounded-full font-black text-sm tracking-wider">JANGKAUAN GLOBAL</span>
                </div>
                <h2 class="text-gray-900 mb-6">
                    Pilih <span class="text-[#FFC50F]">eSIM</span> Terpopuler
                </h2>
                <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                    Pilihan eSIM terbaik untuk perjalanan Anda, tersedia di berbagai negara
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products->take(6) as $product)
                <div class="relative group bg-white rounded-3xl overflow-hidden border-4 border-[#FFC50F]/30 hover:border-[#FFC50F] transition-all card-shadow-yellow transform hover:-translate-y-2">
    <!-- Redesigned header with gradient background -->
    <div class="relative h-40 md:h-48 lg:h-56 hero-gradient overflow-hidden">
        <!-- Flag positioned in top-left corner -->
        @php
            $flag = null;
            if ($product->countries && $product->countries->count()) {
                $country = $product->countries->first();
                $flag = $country->code ? 'https://flagcdn.com/48x36/' . strtolower($country->code) . '.png' : null;
            }
        @endphp
        @if($flag)
            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg shadow-lg p-2 border-2 border-white">
                <img src="{{ $flag }}" alt="{{ $country->name }}" class="w-16 h-12 md:w-20 md:h-16 lg:w-24 lg:h-18 object-contain">
            </div>
        @else
            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg shadow-lg p-2 border-2 border-white">
                <img src="{{ asset('images/products/default.png') }}" alt="{{ $product->name }}" class="w-16 h-12 md:w-20 md:h-16 lg:w-24 lg:h-18 object-contain">
            </div>
        @endif

        <!-- Optional: Add product name or icon in center -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white/20 text-7xl md:text-8xl lg:text-9xl font-black">
                {{ strtoupper(substr($product->name, 0, 1)) }}
            </div>
        </div>
    </div>

    <div class="p-6">
        <h3 class="text-gray-900 mb-3 font-bold text-lg">{{ $product->name }}</h3>
        <div class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</div>

        <!-- Info grid with better spacing -->
        <div class="space-y-3 mb-6">
            <div class="flex items-center justify-between">
                <span class="text-xs text-gray-500 font-semibold">Kuota</span>
                <span class="font-black text-gray-900">{{ $product->quota ? $product->quota . 'GB' : 'Unlimited' }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-xs text-gray-500 font-semibold">Masa Aktif</span>
                <span class="font-black text-gray-900">{{ $product->validity }} Hari</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-xs text-gray-500 font-semibold">Operator</span>
                <span class="font-black text-gray-900">{{ $product->operator }}</span>
            </div>

            <!-- Price with more emphasis -->
            <div class="flex items-center justify-between pt-3 border-t-2 border-gray-100">
                <span class="text-sm text-gray-700 font-bold">Harga</span>
                <span class="text-2xl font-black text-[#FFC50F]">Rp {{ number_format($product->price * 1000, 0, ',', '.') }}</span>
            </div>
        </div>

        <a href="{{ route('products.show', $product->id) }}" class="w-full block bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black py-3 rounded-2xl hover:from-[#FFD700] hover:to-[#FFC50F] transition-all font-black text-base shadow-xl hover:shadow-2xl transform hover:scale-105 text-center">
            Lihat Detail
        </a>
    </div>
</div>
                @endforeach
            </div>
        </div>
        <div class="text-center mt-10">
            <a href="{{route('countries.index')}}">
                <button class="group px-12 py-5 border-4 border-[#FFC50F] text-black bg-white hover:bg-[#FFC50F] rounded-2xl transition-all font-black text-xl shadow-xl hover:shadow-2xl transform hover:scale-105">
                        <span class="flex items-center gap-3">
                            Lihat Semua Negara
                            <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </button>
                </a>

        </div>
    </section>

    <!-- Informational Sections - Staggered Creative Layout -->
<section class="relative py-24 bg-black overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1644088379091-d574269d422f')] bg-cover bg-center"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">

        <!-- TOP: 2 Cards Same Height -->
        <div class="grid lg:grid-cols-2 gap-12 mb-20 items-stretch">

            <!-- Card A -->
            <div class="relative h-full">
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-[#FFC50F] rounded-full blur-3xl"></div>
                <div class="relative bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-[3rem] p-1 h-full">
                    <div class="bg-black rounded-[2.8rem] p-10 h-full flex flex-col">

                        <!-- Icon (Not tilted) -->
                        <div class="w-20 h-20 bg-[#FFC50F] rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                            </svg>
                        </div>

                        <h3 class="text-white mb-6">Apa itu eSIM Roaming?</h3>
                        <p class="text-gray-300 text-lg mb-8">
                            eSIM adalah SIM card <span class="text-[#FFC50F] font-bold">digital</span> yang tertanam di perangkat Anda. Tidak perlu kartu fisik, aktifkan secara online!
                        </p>

                        <div class="space-y-4 mt-auto">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white font-semibold text-lg">Tanpa kartu fisik</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white font-semibold text-lg">Aktif dalam hitungan menit</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white font-semibold text-lg">Hemat biaya roaming hingga 90%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card B -->
            <div class="relative h-full">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#FFD700] rounded-full blur-3xl"></div>
                <div class="relative bg-gradient-to-br from-[#FFD700] to-[#FFA500] rounded-[3rem] p-1 h-full">
                    <div class="bg-black rounded-[2.8rem] p-10 h-full flex flex-col">

                        <!-- Icon (Not tilted) -->
                        <div class="w-20 h-20 bg-gradient-to-br from-[#FFD700] to-[#FFA500] rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>

                        <h3 class="text-white mb-6">Cek Perangkat Kamu</h3>
                        <p class="text-gray-300 text-lg mb-8">
                            Pastikan perangkat Anda mendukung <span class="text-[#FFD700] font-bold">eSIM</span> sebelum membeli.
                        </p>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold">iPhone XS & lebih baru</span>
                            </div>

                            <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold">Samsung Galaxy S20+</span>
                            </div>

                            <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold">Google Pixel 3+</span>
                            </div>
                        </div>

                        <button class="text-[#FFD700] hover:text-white font-bold text-lg flex items-center gap-2 group mt-auto">
                            <span>Lihat Daftar Lengkap</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOTTOM: Long Card -->
        <div class="max-w-4xl mx-auto">
            <div class="relative bg-gradient-to-br from-[#FFA500] to-[#FFC50F] rounded-[3rem] p-1">
                <div class="bg-black rounded-[2.8rem] p-12">

                    <div class="text-center mb-12">
                        <div class="w-24 h-24 bg-gradient-to-br from-[#FFA500] to-[#FFC50F] rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-14 h-14 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>

                        <h3 class="text-white mb-4">Langkah Mudah Pasang eSIM</h3>
                        <p class="text-gray-300 text-lg">3 langkah sederhana untuk terhubung</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-[#FFC50F] rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl font-black text-black">1</span>
                            </div>
                            <h4 class="text-white mb-3">Beli eSIM</h4>
                            <p class="text-gray-400">Pilih paket yang sesuai kebutuhan Anda.</p>
                        </div>

                        <div class="text-center">
                            <div class="w-20 h-20 bg-[#FFD700] rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl font-black text-black">2</span>
                            </div>
                            <h4 class="text-white mb-3">Scan QR Code</h4>
                            <p class="text-gray-400">QR code dikirim via email.</p>
                        </div>

                        <div class="text-center">
                            <div class="w-20 h-20 bg-[#FFA500] rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl font-black text-black">3</span>
                            </div>
                            <h4 class="text-white mb-3">Aktifkan</h4>
                            <p class="text-gray-400">eSIM siap dipakai di seluruh dunia!</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>





    <!-- Footer -->
    <footer class="relative bg-gradient-to-b from-gray-900 to-black text-white pt-20 pb-8 overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#FFC50F] rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#FFD700] rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-4 gap-12 mb-16">
                <!-- Company Info -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black">RAV<span class="text-[#FFC50F]">CONNECT</span></span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Solusi eSIM terpercaya untuk perjalanan global Anda. Terhubung di 100+ negara tanpa ribet!
                    </p>
                    <div class="flex gap-3">
                        <button class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-[#FFC50F] hover:text-black transition-all transform hover:scale-110 border border-white/20 hover:border-[#FFC50F]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </button>
                        <button class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-[#FFC50F] hover:text-black transition-all transform hover:scale-110 border border-white/20 hover:border-[#FFC50F]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </button>
                        <button class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-[#FFC50F] hover:text-black transition-all transform hover:scale-110 border border-white/20 hover:border-[#FFC50F]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white mb-6 font-black">Menu</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Beranda
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Tentang Kami
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Cara Kerja
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Blog
                        </a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-white mb-6 font-black">Bantuan</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            FAQ
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Cara Aktivasi
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Perangkat Support
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Hubungi Kami
                        </a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="text-white mb-6 font-black">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Syarat & Ketentuan
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Kebijakan Privasi
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Pengembalian Dana
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Disclaimer
                        </a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
                    <div class="text-gray-400 text-sm">
                        <p>&copy; 2024 <span class="text-[#FFC50F] font-bold">RAVCONNECT</span>. All rights reserved.</p>
                    </div>
                    <div class="text-gray-500 text-xs">
                        <p>Powered by Advanced eSIM Technology ⚡</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bottom Mobile Navigation - Bold Design -->
<nav class="fixed bottom-0 left-0 right-0 bg-black border-t-4 border-[#FFC50F] z-50 md:hidden shadow-2xl">
    <div class="relative">

        <!-- Pop-out Center Button -->
        <div class="absolute left-1/2 transform -translate-x-1/2 -top-8 z-20">
            <a href="/my_esim" class="block">
                <button class="w-16 h-16 bg-[#FFC50F] text-black rounded-full shadow-2xl border-4 border-white flex flex-col items-center justify-center text-lg font-black hover:bg-[#FFD700] transition-all">
                    <svg class="w-8 h-8 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                        </path>
                    </svg>
                    My eSIM
                </button>
            </a>
        </div>

        <!-- Bottom Nav Items -->
        <div class="grid grid-cols-5 text-center pt-8">
            <!-- Home -->
            <button class="flex flex-col items-center justify-center py-3 text-[#FFC50F] bg-[#FFC50F]/10 relative">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-1 bg-[#FFC50F] rounded-full"></div>
                <svg class="w-7 h-7 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="text-xs font-black">Home</span>
            </button>

            <!-- History -->
            <button class="flex flex-col items-center justify-center py-3 text-white hover:text-[#FFC50F] transition-all">
                <svg class="w-7 h-7 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                    </path>
                </svg>
                <span class="text-xs font-semibold">History</span>
            </button>

            <!-- Spacer for the floating button -->
            <div></div>

            <!-- Cart -->
            <button class="flex flex-col items-center justify-center py-3 text-white hover:text-[#FFC50F] transition-all">
                <svg class="w-7 h-7 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <span class="text-xs font-semibold">Cart</span>
            </button>

            <!-- Support -->
            <button class="flex flex-col items-center justify-center py-3 text-white hover:text-[#FFC50F] transition-all">
                <svg class="w-7 h-7 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                <span class="text-xs font-semibold">Support</span>
            </button>
        </div>
    </div>
</nav>


</body>
</html>
