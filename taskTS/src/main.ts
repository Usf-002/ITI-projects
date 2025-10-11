// IMPORTANT: keep the ".js" extensions in imports so the emitted code works in the browser
import { createApiResponse, type ApiResponse } from "./api.js";
import { printUser, admin, type User } from "./interfaces.js";
import { ConsoleLogger } from "./logging.js";

type Product = { id: number; name: string; price: number };

const ok: ApiResponse<Product> = createApiResponse(
  { id: 1, name: "Keyboard", price: 999 },
  "success"
);

const bad: ApiResponse<Product> = createApiResponse<Product>(
  null,
  "error",
  "Product not found"
);

console.log("OK:", ok);
console.log("BAD:", bad);


printUser(admin);

// Logger demo
const logger = new ConsoleLogger();
logger.log("Main completed without UserRepository.");


declare global {
  interface Window {
    printUser: (u: User) => void;
    createApiResponse: typeof createApiResponse;
  }
}
window.printUser = printUser;
window.createApiResponse = createApiResponse;
