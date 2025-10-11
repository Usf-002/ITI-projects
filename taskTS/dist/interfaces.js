// 2) Object with same structure but without declaring its type
const person = {
    id: 1,
    name: "Layla",
    email: "layla@example.com"
};
// 3) Assign person to a variable of type User
const u1 = person;
// 4) Add extra property to person
const personWithExtra = {
    id: 2,
    name: "Omar",
    email: "omar@example.com",
    role: "guest"
};
const u2 = personWithExtra; // OK when assigning a variable
// 5) Function printUser
export function printUser(u) {
    console.log(`User #${u.id}: ${u.name}`);
}
// 7) Create an Admin object and print it
export const admin = {
    id: 99,
    name: "Root",
    email: "root@example.com",
    permissions: ["users:read", "users:write", "system:shutdown"]
};
console.log("Admin:", admin);
// 8) Structural typing explanation
// Structural typing means compatibility depends on the shape of the data rather than the declared name.
// If it has the required properties with the right types, it is compatible.
