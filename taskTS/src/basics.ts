// 1) Basic Typing & Type Inference

// 2) Variables
let username: string = "Alice";
let age: number = 22;
let isLoggedIn: boolean = true;

// 3) Invalid types 
// username = 123;              
// age = "twenty two";        
// isLoggedIn = "yes";         

// 4) Union
let id: string | number;
id = 1001;
id = "user-1001";

// 5) Inference
const city = "Cairo"; 
// city = 10;          

// 6) Function with optional parameter
export function greet(name: string, age?: number): string {
  return age !== undefined
    ? `Hello ${name}, you are ${age} years old.`
    : `Hello ${name}.`;
}

// 7) Calls
greet("Ali");
greet("Sara", 30);

// 8) What is type inference?
// TypeScript can assume a variable type from its initializer. Example: `const city = "Cairo"` becomes string automatically.
