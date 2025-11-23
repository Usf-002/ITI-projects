import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  products: [],
};

const basketSlice = createSlice({
  name: "basket",
  initialState,
  reducers: {
    addItemToBasket(state, action) {
      const item = action.payload;
      const found = state.products.find((p) => p.id === item.id);
      if (found) {
        found.qty += 1;
      } else {
        state.products.push({
          id: item.id,
          title: item.title,
          price: item.price,
          thumbnail: item.thumbnail,
          qty: 1,
        });
      }
    },
    removeItemFromBasket(state, action) {
      const itemId = action.payload;
      state.products = state.products.filter((p) => p.id !== itemId);
    },
    increaseQty(state, action) {
      const itemId = action.payload;
      const found = state.products.find((p) => p.id === itemId);
      if (found) found.qty += 1;
    },
    decreaseQty(state, action) {
      const itemId = action.payload;
      const found = state.products.find((p) => p.id === itemId);
      if (!found) return;
      if (found.qty > 1) {
        found.qty -= 1;
      } else {
        state.products = state.products.filter((p) => p.id !== itemId);
      }
    },
    emptyBasket(state) {
      state.products = [];
    },
  },
});

export const {
  addItemToBasket,
  removeItemFromBasket,
  increaseQty,
  decreaseQty,
  emptyBasket,
} = basketSlice.actions;

// selectors
export const getBasketProducts = (state) => state.basket.products;

export const getBasketItemsCount = (state) =>
  state.basket.products.reduce((total, p) => total + p.qty, 0);

export const getBasketTotalPrice = (state) =>
  state.basket.products.reduce((total, p) => total + p.qty * p.price, 0);

export default basketSlice.reducer;
