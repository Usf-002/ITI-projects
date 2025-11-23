import { configureStore } from "@reduxjs/toolkit";
import basketReducer from "../features/basket/basketSlice.js";

const store = configureStore({
  reducer: {
    basket: basketReducer,
  },
});

export default store;
