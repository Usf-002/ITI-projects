import { createApiResponse } from "./api.js";
import { printUser, admin } from "./interfaces.js";
import { UserRepository } from "./userRepo.js";
import { ConsoleLogger } from "./logging.js";
// Create responses
const good = createApiResponse({ id: 1, name: "Keyboard", price: 999 }, "success");
const bad = createApiResponse(null, "error", "Product not found");
console.log("Good API:", good);
console.log("Bad API:", bad);
// 4.3) Wrong data type example (uncomment to see the error)
// const wrong: ApiResponse<Product> = createApiResponse<string>("oops", "success");
// 4.4) Generics allow writing reusable code where type parameters (<T>) plug in concrete types later.
// 4.5) ES modules use `export` and `import`. See api.ts exports and imports above.
// Also reuse from other tasks so everything runs in one entry:
printUser(admin);
// Mini demo
const repo = new UserRepository();
repo.add({ id: 1, name: "Mona", email: "mona@example.com" });
repo.add({ id: 2, name: "Hadi", email: "hadi@example.com" });
const users = repo.getAll();
const wrappedUsers = createApiResponse(users, "success", "Fetched users");
console.log("Wrapped users:", wrappedUsers);
// Log something
const log = new ConsoleLogger();
log.log("Main completed.");
