// 2) Abstract class BaseLogger
export class BaseLogger {
    printDate() {
        console.log(new Date().toISOString());
    }
}
// 3) ConsoleLogger that extends BaseLogger and implements Logger
export class ConsoleLogger extends BaseLogger {
    log(message) {
        this.printDate();
        console.log(message);
    }
}
// 4) Instantiate and call
const logger = new ConsoleLogger();
logger.log("Hello from ConsoleLogger");
// 5) Difference explanation
// Interface: describes a contract. No implementation. A class can implement many interfaces.
// Abstract class: can include both abstract and concrete members. A class can extend only one abstract class.
