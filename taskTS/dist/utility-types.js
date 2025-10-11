"use strict";
// 2) Partial<User>
const updateUser = {
    name: "Updated Name"
};
// 3) Readonly<User>
const profile = {
    id: 10,
    name: "Readonly Ray",
    email: "ray@example.com"
    // age is optional
};
const shortUser = { id: 1, name: "Shorty" };
// 5) Notes
// Partial<T> makes all properties optional.
// Readonly<T> makes all properties immutable.
// Pick<T, K> creates a new type with only the chosen keys.
