// 1) Interface
interface User {
  id: number;
  name: string;
  age?: number;
  email: string;
}

// 2) Partial<User>
const updateUser: Partial<User> = {
  name: "Updated Name"
};

// 3) Readonly<User>
const profile: Readonly<User> = {
  id: 10,
  name: "Readonly Ray",
  email: "ray@example.com"
  // age is optional
};
// profile.name = "Changed"; // Error: cannot assign to a readonly property

// 4) Pick only id and name
type IdName = Pick<User, "id" | "name">;
const shortUser: IdName = { id: 1, name: "Shorty" };

// 5) Notes
// Partial<T> makes all properties optional.
// Readonly<T> makes all properties immutable.
// Pick<T, K> creates a new type with only the chosen keys.
