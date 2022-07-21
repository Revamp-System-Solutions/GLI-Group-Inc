<template>
  <errors-and-messages :errors="errors"></errors-and-messages>
  <div class="flex bg-gray-100">
    <app-header-small
      :user="user"
      :menu-links="menuLinks"
      :menu-sub-links="menuSubLinks"
    />
    <div id="content-area" class="max-w-7xl md:w-9/12 mx-auto">
      <div class="flex flex-col justify-center px-4">
        <!-- search box -->
        <div class="flex justify-between">
          <span class="text-xl inline-block p-3 font-semibold text-gray-700">
           Pages
            <inertia-link
              class="
              hidden
              disabled
                ml-4
                inline-block
                border
                py-1
                px-3
                rounded
                border-green-700
                text-green-700 text-base
                font-normal
                transition
                ease-out
                duration-400
                hover:bg-green-700 hover:text-white
              "
              :href="$route('portfolio.create')"
            >
              <i class="fas fa-plus"></i> Add New
            </inertia-link>
          </span>
          <div class="pt-2 relative text-gray-600">
            <input
              class="
                border-2 border-gray-300
                bg-white
                h-10
                px-5
                pr-16
                rounded-lg
                text-sm
                focus:outline-none
              "
              type="search"
              name="search"
              placeholder="Search"
            />
            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
              <svg
                class="text-gray-600 h-4 w-4 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                id="Capa_1"
                x="0px"
                y="0px"
                viewBox="0 0 56.966 56.966"
                style="enable-background: new 0 0 56.966 56.966"
                xml:space="preserve"
                width="512px"
                height="512px"
              >
                <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                />
              </svg>
            </button>
          </div>
        </div>
        <!-- table -->
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th
                scope="col"
                class="
                  px-6
                  py-3
                  text-left text-xs
                  font-medium
                  text-gray-500
                  uppercase
                  tracking-wider
                "
              >
                Title
              </th>
      
              <th
                scope="col"
                class="
                  px-6
                  py-3
                  text-left text-xs
                  font-medium
                  text-gray-500
                  uppercase
                  tracking-wider
                "
              >
                Author
              </th>
              <th
                scope="col"
                class="
                  px-6
                  py-3
                  text-left text-xs
                  font-medium
                  text-gray-500
                  uppercase
                  tracking-wider
                "
              >
                Actions
              </th>
            </tr>
          </thead>
          <tbody
            v-if="pages.data.length > 0"
            class="bg-white divide-y divide-gray-200"
          >
            <tr v-for="page in pages.data" :key="page.id">
              <td class="px-6 py-4 whitespace-nowrap w-2/4">
                <div class="text-sm font-bold text-gray-700">
                  {{ page.page_title }}
                </div>
                <div class="text-xs italic text-gray-500">
                  {{ page.updated_at == null  ? '-': page.updated_at.split("T")[0] }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-bold text-gray-700">
                  {{ page.author }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap space-x-1">
                <inertia-link
                  :href="$route('page.change', { slug: page.slug })"
                  class="text-sm text-white bg-blue-400 px-3 py-1 rounded-sm"
                  v-if="user"
                  ><i class="fas fa-edit"></i> Edit page</inertia-link
                >
                <a
                  href="javascript:void(0);"
                  class="text-sm text-white bg-red-400 px-3 py-1 rounded-sm"
                  @click.prevent="openModal(page.slug)"
                  v-if="user"
                  ><i class="fas fa-trash-alt"></i> Delete page</a
                >
                
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr class="text-center">
              <td colspan="4" class="text-center px-6 py-4 whitespace-nowrap">
                <div class="mb-2">No pages found!</div>
                <inertia-link
                  class="
                    inline-block
                    border
                    py-1
                    px-3
                    rounded
                    border-green-700
                    text-green-700 text-base
                    font-normal
                    hover:bg-green-700 hover:text-white
                    transition
                    ease-out
                    duration-400
                  "
                  :href="$route('portfolio.create')"
                >
                  <i class="fas fa-plus"></i> Add New
                </inertia-link>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- pagination -->
        <nav
          aria-label="Page navigation"
          v-if="pages.total > pages.per_page"
          style="margin-top: 20px"
          class="w-1/5 mx-auto"
        >
          <ul class="pagination flex flex-row justify-between">
            <!-- Previous link -->
            <li
              :class="
                'page-item' + (pages.links[0].url == null ? ' disabled' : '')
              "
            >
              <inertia-link
                :href="pages.links[0].url == null ? '#' : pages.links[0].url"
                class="page-link"
                v-html="pages.links[0].label"
              ></inertia-link>
            </li>

            <!-- Numbers -->
            <li
              v-for="item in numberLinks"
              :class="'page-item' + (item.active ? ' disabled' : '')"
              :key="item"
            >
              <inertia-link
                :href="item.active ? '#' : item.url"
                class="page-link"
                v-html="item.label"
              ></inertia-link>
            </li>

            <!-- Next link -->
            <li
              :class="
                'page-item' +
                (pages.links[pages.links.length - 1].url == null
                  ? ' disabled'
                  : '')
              "
            >
              <inertia-link
                :href="
                  pages.links[pages.links.length - 1].url == null
                    ? '#'
                    : pages.links[pages.links.length - 1].url
                "
                class="page-link"
                v-html="pages.links[pages.links.length - 1].label"
              ></inertia-link>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

</template>

<script>
import AppHeaderSmall from "./../../../Partials/AppHeaderSmall";
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject, ref } from "vue";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogOverlay,
  DialogTitle,
} from "@headlessui/vue";
export default {
  name: "pages",
  components: {
    ErrorsAndMessages,
    AppHeaderSmall,
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
  },
  props: {
    errors: Object,
  },
  data: () => ({}),
  methods: {},
  setup() {
    const route = inject("$route");

   

    const user = computed(() => usePage().props.value.auth.user);
    const pages = computed(() => usePage().props.value.page_list);
     const numberLinks = pages.value.links.filter(
      (v, i) => i > 0 && i < pages.value.links.length - 1
    );

    const menuLinks = computed(
      () => usePage().props.value.page_links.parentLinks
    );
    const menuSubLinks = computed(
      () => usePage().props.value.page_links.subLinks
    );

    return {
      menuLinks,
      menuSubLinks,
      user,
     pages,
     numberLinks
    };
  },
};
</script>
