import { throttle } from "lodash";
import http from "~/services/http";
import { defineStore } from "pinia";

export const useSelect = defineStore("select", {
  actions: {
    select: throttle(async function (query, url) {
      try {
        const { data } = await http.get(
          `${url}?filter[name]=${encodeURIComponent(query)}`,
        );

        return data.data.map((v) => {
          return {
            value: v.id,
            label: v.name,
          };
        });
      } catch (error) {
        console.error(error);
      }
    }, 200),
  },
});
