// 1) ApiResponse<T> and factory
export interface ApiResponse<T> {
  response: T | null;
  status: "success" | "error";
  message?: string;
}

export function createApiResponse<T>(
  data: T | null,
  status: "success" | "error",
  message?: string
): ApiResponse<T> {
  return { response: data, status, message };
}
