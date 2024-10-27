
    <template>
        <nav class="fixed text-white py-4 px-6 flex justify-between items-center  top-0 left-0 w-full bg-slate-800 z-40">
           <ApplicationLogo />
            <ul class="hidden md:flex sp.ace-x-8">
                <li class="px-4"><Link href="/design-templates " class="hover:text-gray-300 ">Design Templates</Link></li>
                <li class="px-4"><Link href="/courses" class="hover:text-gray-300 ">Courses</Link></li>
                <li class="px-4"><Link href="/free-resources" class="hover:text-gray-300 ">Free Resources</Link></li>
                <li class="px-4"><Link href="/portfolio" class="hover:text-gray-300 ">
                    <button
                        class="flex items-center justify-center text-center  bg-yellow-500 px-2 py-1 rounded-md font-bold"
                        style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);"
                    >
                        Portfolio
                    </button>

                </Link></li>

            </ul>
            <button @click="toggleMenu" class="block md:hidden">
                <!-- Mobile menu icon (Hamburger) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <!-- Mobile Dropdown Menu -->
            <ul v-if="isMenuOpen" class="absolute top-16 left-0 px-6 w-full  flex flex-col items-start space-y-4 md:hidden">
                <li><a href="design-template" class="hover:text-gray-300">Design Templates</a></li>
                <li><a href="courses" class="hover:text-gray-300">Courses</a></li>
                <li><a href="#free-courses" class="hover:text-gray-300">Free Resources</a></li>
                <li><a href="portfolio" class="hover:text-gray-300">
                    <button
                        class="flex items-center justify-center text-center  bg-yellow-500 px-2 py-1 rounded-md font-bold"
                        style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);"
                    >
                        Portfolio
                    </button>

                </a></li>
            </ul>
        </nav>
    </template>

    <script>
        export default {
            data() {
                return {
                    isMenuOpen: false
                };
            },
            methods: {
                toggleMenu() {
                    this.isMenuOpen = !this.isMenuOpen;
                }
            }
        };
    </script>

    <script setup>
    import {Link} from "@inertiajs/vue3";
    import ApplicationLogo from "@/Components/ApplicationLogo.vue";
    </script>
