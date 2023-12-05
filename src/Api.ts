/* eslint-disable */
/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { AxiosInstance, AxiosRequestConfig, AxiosResponse, HeadersDefaults, ResponseType } from "axios";
import axios from "axios";

export type QueryParamsType = Record<string | number, any>;

export interface FullRequestParams extends Omit<AxiosRequestConfig, "data" | "params" | "url" | "responseType"> {
  /** set parameter to `true` for call `securityWorker` for this request */
  secure?: boolean;
  /** request path */
  path: string;
  /** content type of request body */
  type?: ContentType;
  /** query params */
  query?: QueryParamsType;
  /** format of response (i.e. response.json() -> format: "json") */
  format?: ResponseType;
  /** request body */
  body?: unknown;
}

export type RequestParams = Omit<FullRequestParams, "body" | "method" | "query" | "path">;

export interface ApiConfig<SecurityDataType = unknown> extends Omit<AxiosRequestConfig, "data" | "cancelToken"> {
  securityWorker?: (
    securityData: SecurityDataType | null,
  ) => Promise<AxiosRequestConfig | void> | AxiosRequestConfig | void;
  secure?: boolean;
  format?: ResponseType;
}

export enum ContentType {
  Json = "application/json",
  FormData = "multipart/form-data",
  UrlEncoded = "application/x-www-form-urlencoded",
  Text = "text/plain",
}

export class HttpClient<SecurityDataType = unknown> {
  public instance: AxiosInstance;
  private securityData: SecurityDataType | null = null;
  private securityWorker?: ApiConfig<SecurityDataType>["securityWorker"];
  private secure?: boolean;
  private format?: ResponseType;

  constructor({ securityWorker, secure, format, ...axiosConfig }: ApiConfig<SecurityDataType> = {}) {
    this.instance = axios.create({ ...axiosConfig, baseURL: axiosConfig.baseURL || "http://127.0.0.1:8000" });
    this.secure = secure;
    this.format = format;
    this.securityWorker = securityWorker;
  }

  public setSecurityData = (data: SecurityDataType | null) => {
    this.securityData = data;
  };

  protected mergeRequestParams(params1: AxiosRequestConfig, params2?: AxiosRequestConfig): AxiosRequestConfig {
    const method = params1.method || (params2 && params2.method);

    return {
      ...this.instance.defaults,
      ...params1,
      ...(params2 || {}),
      headers: {
        ...((method && this.instance.defaults.headers[method.toLowerCase() as keyof HeadersDefaults]) || {}),
        ...(params1.headers || {}),
        ...((params2 && params2.headers) || {}),
      },
    };
  }

  protected stringifyFormItem(formItem: unknown) {
    if (typeof formItem === "object" && formItem !== null) {
      return JSON.stringify(formItem);
    } else {
      return `${formItem}`;
    }
  }

  protected createFormData(input: Record<string, unknown>): FormData {
    return Object.keys(input || {}).reduce((formData, key) => {
      const property = input[key];
      const propertyContent: any[] = property instanceof Array ? property : [property];

      for (const formItem of propertyContent) {
        const isFileType = formItem instanceof Blob || formItem instanceof File;
        formData.append(key, isFileType ? formItem : this.stringifyFormItem(formItem));
      }

      return formData;
    }, new FormData());
  }

  public request = async <T = any, _E = any>({
    secure,
    path,
    type,
    query,
    format,
    body,
    ...params
  }: FullRequestParams): Promise<AxiosResponse<T>> => {
    const secureParams =
      ((typeof secure === "boolean" ? secure : this.secure) &&
        this.securityWorker &&
        (await this.securityWorker(this.securityData))) ||
      {};
    const requestParams = this.mergeRequestParams(params, secureParams);
    const responseFormat = format || this.format || undefined;

    if (type === ContentType.FormData && body && body !== null && typeof body === "object") {
      body = this.createFormData(body as Record<string, unknown>);
    }

    if (type === ContentType.Text && body && body !== null && typeof body !== "string") {
      body = JSON.stringify(body);
    }

    return this.instance.request({
      ...requestParams,
      headers: {
        ...(requestParams.headers || {}),
        ...(type && type !== ContentType.FormData ? { "Content-Type": type } : {}),
      },
      params: query,
      responseType: responseFormat,
      data: body,
      url: path,
    });
  };
}

/**
 * @title Paradiso API
 * @version 1.0.0
 * @baseUrl http://127.0.0.1:8000
 */
export class Api<SecurityDataType extends unknown> extends HttpClient<SecurityDataType> {
  api = {
    /**
     * @description Login to the application
     *
     * @tags Auth
     * @name Login
     * @summary Login
     * @request POST:/api/v1/auth
     */
    login: (
      data: {
        /**
         * The name of the user.
         * @example "merchant"
         */
        name: string;
        /**
         * The email of the user.
         * @example "merchant@mail.com"
         */
        email: string;
        /**
         * The password of the user.
         * @example "password"
         */
        password: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/auth`,
        method: "POST",
        body: data,
        type: ContentType.Json,
        ...params,
      }),

    /**
     * @description Logout from the application
     *
     * @tags Auth
     * @name Logout
     * @summary Logout
     * @request POST:/api/v1/logout
     * @secure
     */
    logout: (params: RequestParams = {}) =>
      this.request<
        {
          /** @example "Logged out" */
          message?: string;
        },
        any
      >({
        path: `/api/v1/logout`,
        method: "POST",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Merchant
     * @name GetMerchantProfile
     * @summary Get merchant profile
     * @request GET:/api/v1/merchants/me
     * @secure
     */
    getMerchantProfile: (params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Merchant profile retrieved successfully" */
          message?: string;
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "merchant" */
            name?: string;
            /** @example "https://picsum.photos/100/100" */
            logo?: string;
            /** @example 0 */
            is_highlight?: number;
            /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
            notes?: string;
            /** @example "2023-11-26T12:36:58.000000Z" */
            created_at?: string;
            /** @example "2023-11-26T12:36:58.000000Z" */
            updated_at?: string;
            profile?: {
              /** @example 1 */
              id?: number;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              description?: string;
              /** @example "Jl. Test" */
              address?: string;
              /** @example "https://picsum.photos/500/250" */
              banner?: string;
              /** @example "1234567890123456" */
              ktp_number?: string;
              /** @example null */
              npwp_number?: string;
              /** @example null */
              siup_number?: string;
              /** @example "https://picsum.photos/500/250" */
              ktp?: string;
              /** @example null */
              npwp?: string;
              /** @example null */
              siup?: string;
            };
            level?: {
              /** @example 1 */
              id?: number;
              /** @example "standart" */
              name?: string;
              /** @example "https://via.placeholder.com/640x480.png/0000ee?text=voluptas" */
              icon?: string;
            };
            status?: {
              /** @example 3 */
              id?: number;
              /** @example "Accepted" */
              name?: string;
              /** @example "https://via.placeholder.com/640x480.png/006600?text=velit" */
              icon?: string;
              /** @example "#85318d" */
              color?: string;
            };
          };
        },
        any
      >({
        path: `/api/v1/merchants/me`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Merchant
     * @name UpdateMerchantProfile
     * @summary Update merchant profile
     * @request PUT:/api/v1/merchants
     * @secure
     */
    updateMerchantProfile: (
      data?: {
        /** @example "suscipit" */
        name?: string;
        /**
         * Must be a file.
         * @format binary
         */
        logo?: File;
        /** @example "et" */
        address?: string;
        /**
         * Must be a file.
         * @format binary
         */
        banner?: File;
        /** @example "Ipsa eligendi aut magni." */
        description?: string;
        /** @example "sunt" */
        notes?: string;
        /**
         * Must be 16 characters.
         * @example "wftvieyfhsawspvo"
         */
        ktp_number?: string;
        /**
         * Must be 15 characters.
         * @example "cnwrlhbtejahumx"
         */
        npwp_number?: string;
        /**
         * Must be 13 characters.
         * @example "uprmnvlfrmpkg"
         */
        siup_number?: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/merchants`,
        method: "PUT",
        body: data,
        secure: true,
        type: ContentType.FormData,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Statistic
     * @name GetMerchantsStatistic
     * @summary Get merchant's statistic.
     * @request GET:/api/v1/merchants/me/statistic
     * @secure
     */
    getMerchantsStatistic: (
      query?: {
        /**
         * The time range of the product statistic.
         * @example "week"
         */
        product_time_range?: string;
        /**
         * The time range of the transaction statistic.
         * @example "week"
         */
        transaction_time_range?: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Merchant's statistic retrieved successfully." */
          message?: string;
          data?: {
            /** @example 25 */
            order_count_new?: number;
            /** @example 7 */
            order_count_pending?: number;
            /** @example 9 */
            review_count?: number;
            /** @example 0 */
            message_count_new?: number;
            /** @example "in progress" */
            income?: string;
            store_statistic?: {
              /** @example "in progress" */
              order_count_regular?: string;
              /** @example 0 */
              message_count_responded?: number;
              /** @example 0 */
              message_count_replied?: number;
              /** @example "in progress" */
              store_count_verified?: string;
              /** @example "in progress" */
              store_count_pinalty?: string;
            };
            product_statistic?: {
              /** @example 11 */
              product_count?: number;
              /** @example 2 */
              product_count_sold?: number;
              /** @example 832 */
              product_view_count?: number;
              /** @example 2.88 */
              product_rating_avg?: number;
              /** @example 0 */
              conversion_rate?: number;
            };
            transaction_statistic?: {
              /** @example 9 */
              transaction_count?: number;
              /** @example 1 */
              transaction_count_success?: number;
              /** @example 8 */
              transaction_count_pending?: number;
              /** @example 0 */
              transaction_count_cancelled?: number;
            };
          };
        },
        any
      >({
        path: `/api/v1/merchants/me/statistic`,
        method: "GET",
        query: query,
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Product
     * @name GetAllMerchantsProducts
     * @summary Get all merchant's products.
     * @request GET:/api/v1/merchants/me/products
     * @secure
     */
    getAllMerchantsProducts: (
      query?: {
        /**
         * Product status ID
         * @example 1
         */
        status_id?: number;
        /**
         * Category ID
         * @example 1
         */
        category_id?: number;
        /**
         * Sub Category ID
         * @example 1
         */
        sub_category_id?: number;
        /**
         * Product name (fuzzy search)
         * @example "Prod"
         */
        name?: string;
        /**
         * Product duration
         * @example 1
         */
        duration?: number;
        /**
         * Product minimum start date (Y-m-d)
         * @example "2023-10-16"
         */
        start_date?: string;
        /**
         * Product maximum end date (Y-m-d)
         * @example "2023-10-20"
         */
        end_date?: string;
        /**
         * Product minimum price
         * @example 50000
         */
        price_min?: number;
        /**
         * Product maximum price
         * @example 1000000
         */
        price_max?: number;
        /**
         * Product minimum person
         * @example 1
         */
        person_min?: number;
        /**
         * Product maximum person
         * @example 20
         */
        person_max?: number;
        /**
         * Sort by (default: updated_at)
         * @example "updated_at"
         */
        sort_by?: string;
        /**
         * Sort direction (ASC or DESC) (default: DESC)
         * @example "DESC"
         */
        sort_direction?: string;
        /**
         * Page size (default: 15)
         * @example 15
         */
        page_size?: number;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [{"id":1,"name":"product","description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","duration":1,"start_date":"16/10/2023","end_date":"17/10/2023","price":100000,"unit":"unit","discount":0,"thumbnail":"https://picsum.photos/200/200","address":"Jl. Test","coordinate":"123,123","max_person":10,"min_person":1,"note":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","is_published":0,"created_at":"2023-11-26T12:36:58.000000Z","updated_at":"2023-11-26T12:36:58.000000Z"}] */
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "product" */
            name?: string;
            /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
            description?: string;
            /** @example 1 */
            duration?: number;
            /** @example "16/10/2023" */
            start_date?: string;
            /** @example "17/10/2023" */
            end_date?: string;
            /** @example 100000 */
            price?: number;
            /** @example "unit" */
            unit?: string;
            /** @example 0 */
            discount?: number;
            /** @example "https://picsum.photos/200/200" */
            thumbnail?: string;
            /** @example "Jl. Test" */
            address?: string;
            /** @example "123,123" */
            coordinate?: string;
            /** @example 10 */
            max_person?: number;
            /** @example 1 */
            min_person?: number;
            /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
            note?: string;
            /** @example 0 */
            is_published?: number;
            /** @example "2023-11-26T12:36:58.000000Z" */
            created_at?: string;
            /** @example "2023-11-26T12:36:58.000000Z" */
            updated_at?: string;
          }[];
          links?: {
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/products?page=1" */
            first?: string;
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/products?page=1" */
            last?: string;
            /** @example null */
            prev?: string;
            /** @example null */
            next?: string;
          };
          meta?: {
            /** @example 1 */
            current_page?: number;
            /** @example 1 */
            from?: number;
            /** @example 1 */
            last_page?: number;
            /** @example [{"url":null,"label":"&laquo; Previous","active":false},{"url":"http://127.0.0.1:8000/api/v1/merchants/me/products?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}] */
            links?: {
              /** @example null */
              url?: string;
              /** @example "&laquo; Previous" */
              label?: string;
              /** @example false */
              active?: boolean;
            }[];
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/products" */
            path?: string;
            /** @example 15 */
            per_page?: number;
            /** @example 1 */
            to?: number;
            /** @example 1 */
            total?: number;
          };
        },
        any
      >({
        path: `/api/v1/merchants/me/products`,
        method: "GET",
        query: query,
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Product
     * @name CreateNewProduct
     * @summary Create new product.
     * @request POST:/api/v1/merchants/products
     * @secure
     */
    createNewProduct: (
      data: {
        /**
         * Product sub category id.
         * @example 1
         */
        product_sub_category_id: string;
        /**
         * City id.
         * @example 1
         */
        city_id: string;
        /**
         * Product status id.
         * @example 1
         */
        product_status_id: string;
        /**
         * Product name.
         * @example "Product name"
         */
        name: string;
        /**
         * Product description.
         * @example "Product description"
         */
        description?: string;
        /**
         * Product duration type. This field is required when <code>duration</code> is present.
         * @example "time"
         */
        duration_type?: "time" | "date";
        /**
         * Product duration.
         * @example 3
         */
        duration: number;
        /**
         * Product start date. Must be a valid date in the format <code>Y-m-d</code>.
         * @example "2023-10-14"
         */
        start_date: string;
        /**
         * Product end date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>start_date</code>.
         * @example "2023-10-17"
         */
        end_date: string;
        /**
         * Product price.
         * @example 100000
         */
        price: number;
        /**
         * Product unit.
         * @example "per pack"
         */
        unit: string;
        /**
         * Product discount.
         * @example 0
         */
        discount?: number;
        /**
         * Product thumbnail. Must be a file.
         * @format binary
         */
        thumbnail: File;
        /**
         * Product address.
         * @example "Jl. Test"
         */
        address: string;
        /**
         * Product coordinate.
         * @example "-6.8890653,109.1689806"
         */
        coordinate: string;
        /**
         * Product max person.
         * @example 10
         */
        max_person: number;
        /**
         * Product min person.
         * @example 1
         */
        min_person: number;
        /** @example "voluptas" */
        note?: string;
        /** @example ["repellat"] */
        includes?: string[];
        /** @example ["iusto"] */
        excludes?: string[];
        /** @example ["soluta"] */
        facilities?: string[];
        /** @example ["repellat"] */
        terms?: string[];
        /**
         * Product faqs. Must be a valid JSON string.
         * @example "[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"
         */
        faqs?: string;
        /**
         * Product schedules. Must be a valid JSON string.
         * @example "[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"
         */
        schedules?: string;
        /** Must be a file. */
        images?: File[];
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/merchants/products`,
        method: "POST",
        body: data,
        secure: true,
        type: ContentType.FormData,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Product
     * @name GetProductDetails
     * @summary Get product details.
     * @request GET:/api/v1/products/{product_id}
     */
    getProductDetails: (productId: number, params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Product retrieved successfully" */
          message?: string;
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "product" */
            name?: string;
            /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
            description?: string;
            /** @example 1 */
            duration?: number;
            /** @example "16/10/2023" */
            start_date?: string;
            /** @example "17/10/2023" */
            end_date?: string;
            /** @example 100000 */
            price?: number;
            /** @example "unit" */
            unit?: string;
            /** @example 0 */
            discount?: number;
            /** @example "https://picsum.photos/200/200" */
            thumbnail?: string;
            /** @example "Jl. Test" */
            address?: string;
            /** @example "123,123" */
            coordinate?: string;
            /** @example 10 */
            max_person?: number;
            /** @example 1 */
            min_person?: number;
            /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
            note?: string;
            /** @example 0 */
            is_published?: number;
            /** @example "2023-11-26T12:36:58.000000Z" */
            created_at?: string;
            /** @example "2023-11-26T12:36:58.000000Z" */
            updated_at?: string;
            sub_category?: {
              /** @example 1 */
              id?: number;
              /** @example "autem" */
              name?: string;
              /** @example "https://via.placeholder.com/640x480.png/005588?text=odit" */
              icon?: string;
              product_category?: {
                /** @example 1 */
                id?: number;
                /** @example "non" */
                name?: string;
                /** @example "https://via.placeholder.com/640x480.png/004422?text=aut" */
                icon?: string;
              };
            };
            merchant?: {
              /** @example 1 */
              id?: number;
              /** @example "merchant" */
              name?: string;
              /** @example "https://picsum.photos/100/100" */
              logo?: string;
              /** @example 0 */
              is_highlight?: number;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              notes?: string;
              /** @example "2023-11-26T12:36:58.000000Z" */
              created_at?: string;
              /** @example "2023-11-26T12:36:58.000000Z" */
              updated_at?: string;
            };
            status?: {
              /** @example 1 */
              id?: number;
              /** @example "draft" */
              name?: string;
              /** @example "DeepPink" */
              color?: string;
              /** @example "https://via.placeholder.com/640x480.png/CCCCCC" */
              icon?: string;
            };
            city?: {
              /** @example 1 */
              id?: number;
              /** @example "Kabupaten Aceh Barat" */
              name?: string;
              /** @example "https://via.placeholder.com/640x480.png/00ee11?text=facilis" */
              image?: string;
              /** @example 1 */
              is_highlighted?: number;
            };
            /** @example [{"id":1,"date":"16/10/2023","title":"day 1","schedule_days":[{"id":1,"start_time":"08:00","end_time":"10:00","description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum."},{"id":2,"start_time":"13:00","end_time":"14:00","description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum."}]}] */
            schedules?: {
              /** @example 1 */
              id?: number;
              /** @example "16/10/2023" */
              date?: string;
              /** @example "day 1" */
              title?: string;
              /** @example [{"id":1,"start_time":"08:00","end_time":"10:00","description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum."},{"id":2,"start_time":"13:00","end_time":"14:00","description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum."}] */
              schedule_days?: {
                /** @example 1 */
                id?: number;
                /** @example "08:00" */
                start_time?: string;
                /** @example "10:00" */
                end_time?: string;
                /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
                description?: string;
              }[];
            }[];
            /** @example [{"id":1,"review":"revieww","rating":5,"reply":null,"user":{"id":1,"name":"merchant","user_level":3,"email":"merchant@mail.com","phone":"081234567890","status":1,"created_at":"2023-11-26T12:36:58.000000Z","updated_at":"2023-11-26T12:36:58.000000Z"}},{"id":3,"review":"Itaque a expedita nesciunt placeat voluptatem dolores similique quia. Facilis quisquam ea inventore quo et quia iure. Ex dolor similique assumenda deleniti aut natus. Aliquid provident rem neque ea quisquam temporibus.","rating":4,"reply":null,"user":{"id":1,"name":"merchant","user_level":3,"email":"merchant@mail.com","phone":"081234567890","status":1,"created_at":"2023-11-26T12:36:58.000000Z","updated_at":"2023-11-26T12:36:58.000000Z"}},{"id":4,"review":"Sit minus non consequatur. Aut quia qui molestias repellat est eius. Hic autem quis a.","rating":3,"reply":null,"user":{"id":4,"name":"Evie Tromp","user_level":2,"email":"kiehn.katelin@example.net","phone":"1-231-462-6781","status":1,"created_at":"2023-11-26T12:37:00.000000Z","updated_at":"2023-11-26T12:37:00.000000Z"}},{"id":6,"review":"Praesentium voluptas ullam deserunt maiores libero ut quia odio. Suscipit et delectus accusantium expedita voluptas. Est animi doloremque enim enim cupiditate. Explicabo porro id perferendis ut et.","rating":1,"reply":null,"user":{"id":6,"name":"Prof. Vernon Ortiz","user_level":2,"email":"morris.dibbert@example.org","phone":"+1.626.264.4506","status":1,"created_at":"2023-11-26T12:37:01.000000Z","updated_at":"2023-11-26T12:37:01.000000Z"}},{"id":9,"review":"Assumenda eveniet reiciendis animi possimus libero ullam rerum. Nulla natus sit est occaecati occaecati.","rating":4,"reply":null,"user":{"id":4,"name":"Evie Tromp","user_level":2,"email":"kiehn.katelin@example.net","phone":"1-231-462-6781","status":1,"created_at":"2023-11-26T12:37:00.000000Z","updated_at":"2023-11-26T12:37:00.000000Z"}}] */
            reviews?: {
              /** @example 1 */
              id?: number;
              /** @example "revieww" */
              review?: string;
              /** @example 5 */
              rating?: number;
              /** @example null */
              reply?: string;
              user?: {
                /** @example 1 */
                id?: number;
                /** @example "merchant" */
                name?: string;
                /** @example 3 */
                user_level?: number;
                /** @example "merchant@mail.com" */
                email?: string;
                /** @example "081234567890" */
                phone?: string;
                /** @example 1 */
                status?: number;
                /** @example "2023-11-26T12:36:58.000000Z" */
                created_at?: string;
                /** @example "2023-11-26T12:36:58.000000Z" */
                updated_at?: string;
              };
            }[];
            /** @example [{"id":1,"description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","is_include":1},{"id":2,"description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","is_include":0}] */
            include_excludes?: {
              /** @example 1 */
              id?: number;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              description?: string;
              /** @example 1 */
              is_include?: number;
            }[];
            /** @example [{"id":2,"name":"parkir","icon":"https://via.placeholder.com/640x480.png/00ff33?text=doloribus"},{"id":3,"name":"ac","icon":"https://via.placeholder.com/640x480.png/009977?text=quos"}] */
            facilities?: {
              /** @example 2 */
              id?: number;
              /** @example "parkir" */
              name?: string;
              /** @example "https://via.placeholder.com/640x480.png/00ff33?text=doloribus" */
              icon?: string;
            }[];
            /** @example [{"id":1,"question":"question1","answer":"answer1","is_global":0},{"id":2,"question":"question2","answer":"answer2","is_global":0}] */
            faqs?: {
              /** @example 1 */
              id?: number;
              /** @example "question1" */
              question?: string;
              /** @example "answer1" */
              answer?: string;
              /** @example 0 */
              is_global?: number;
            }[];
            /** @example [{"id":1,"term":"term1","is_global":0},{"id":2,"term":"term2","is_global":0}] */
            terms?: {
              /** @example 1 */
              id?: number;
              /** @example "term1" */
              term?: string;
              /** @example 0 */
              is_global?: number;
            }[];
            /** @example [{"id":1,"image":"https://picsum.photos/360/360"},{"id":2,"image":"https://picsum.photos/360/360"}] */
            images?: {
              /** @example 1 */
              id?: number;
              /** @example "https://picsum.photos/360/360" */
              image?: string;
            }[];
          };
        },
        any
      >({
        path: `/api/v1/products/${productId}`,
        method: "GET",
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Product
     * @name UpdateAProduct
     * @summary Update a product.
     * @request PUT:/api/v1/products/{product_id}
     * @secure
     */
    updateAProduct: (
      productId: number,
      data?: {
        /**
         * Product sub category id.
         * @example 1
         */
        product_sub_category_id?: string;
        /**
         * City id.
         * @example 1
         */
        city_id?: string;
        /**
         * Product status id.
         * @example 1
         */
        product_status_id?: "1" | "2";
        /**
         * Product name.
         * @example "Product name"
         */
        name?: string;
        /**
         * Product description.
         * @example "Product description"
         */
        description?: string;
        /**
         * Product duration type. This field is required when <code>duration</code> is present.
         * @example "time"
         */
        duration_type?: "time" | "date";
        /**
         * Product duration. Must be at least 0.
         * @example 3
         */
        duration?: number;
        /**
         * Product start date. Must be a valid date in the format <code>Y-m-d</code>.
         * @example "2023-10-14"
         */
        start_date?: string;
        /**
         * Product end date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>start_date</code>.
         * @example "2023-10-17"
         */
        end_date?: string;
        /**
         * Product price. Must be at least 0.
         * @example 100000
         */
        price?: number;
        /**
         * Product unit.
         * @example "per pack"
         */
        unit?: string;
        /**
         * Product discount.
         * @example 0
         */
        discount?: number;
        /**
         * Product thumbnail. Must be a file.
         * @format binary
         */
        thumbnail?: File;
        /**
         * Product address.
         * @example "Jl. Test"
         */
        address?: string;
        /**
         * Product coordinate.
         * @example "-6.8890653,109.1689806"
         */
        coordinate?: string;
        /**
         * Product max person. Must be at least 0.
         * @example 10
         */
        max_person?: number;
        /**
         * Product min person. Must be at least 0.
         * @example 1
         */
        min_person?: number;
        /** @example "numquam" */
        note?: string;
        /** @example ["dolores"] */
        includes?: string[];
        /** @example ["illo"] */
        excludes?: string[];
        /** @example [15] */
        facilities?: number[];
        /** @example ["quia"] */
        terms?: string[];
        /**
         * Product faqs. Must be a valid JSON string.
         * @example "[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"
         */
        faqs?: string;
        /**
         * Product schedules. Must be a valid JSON string.
         * @example "[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"
         */
        schedules?: string;
        /** Must be a file. */
        images?: File[];
        /** @example [14] */
        saved_images?: number[];
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/products/${productId}`,
        method: "PUT",
        body: data,
        secure: true,
        type: ContentType.FormData,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Product
     * @name DeleteAProduct
     * @summary Delete a product.
     * @request DELETE:/api/v1/products/{product_id}
     * @secure
     */
    deleteAProduct: (productId: number, params: RequestParams = {}) =>
      this.request<any, any>({
        path: `/api/v1/products/${productId}`,
        method: "DELETE",
        secure: true,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Transaction
     * @name GetAllMerchantsTransactions
     * @summary Get all merchant's transactions.
     * @request GET:/api/v1/merchants/me/transactions
     * @secure
     */
    getAllMerchantsTransactions: (
      query?: {
        /**
         * Transaction status ID
         * @example 50
         */
        status_id?: number;
        /**
         * Order by (default: updated_at)
         * @example "updated_at"
         */
        order_by?: string;
        /**
         * Order direction (ASC or DESC) (default: DESC)
         * @example "DESC"
         */
        order_direction?: string;
        /**
         * Page size (default: 15)
         * @example 15
         */
        page_size?: number;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [{"id":1,"invoice_number":"INV/2021/10/1","item_total_price":200000,"item_total_net_price":200000,"total_voucher_price":0,"amount":200000,"status":{"id":50,"name":null,"description":"Selesai"}}] */
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "INV/2021/10/1" */
            invoice_number?: string;
            /** @example 200000 */
            item_total_price?: number;
            /** @example 200000 */
            item_total_net_price?: number;
            /** @example 0 */
            total_voucher_price?: number;
            /** @example 200000 */
            amount?: number;
            status?: {
              /** @example 50 */
              id?: number;
              /** @example null */
              name?: string;
              /** @example "Selesai" */
              description?: string;
            };
          }[];
          links?: {
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/transactions?page=1" */
            first?: string;
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/transactions?page=1" */
            last?: string;
            /** @example null */
            prev?: string;
            /** @example null */
            next?: string;
          };
          meta?: {
            /** @example 1 */
            current_page?: number;
            /** @example 1 */
            from?: number;
            /** @example 1 */
            last_page?: number;
            /** @example [{"url":null,"label":"&laquo; Previous","active":false},{"url":"http://127.0.0.1:8000/api/v1/merchants/me/transactions?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}] */
            links?: {
              /** @example null */
              url?: string;
              /** @example "&laquo; Previous" */
              label?: string;
              /** @example false */
              active?: boolean;
            }[];
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/transactions" */
            path?: string;
            /** @example 15 */
            per_page?: number;
            /** @example 1 */
            to?: number;
            /** @example 1 */
            total?: number;
          };
        },
        any
      >({
        path: `/api/v1/merchants/me/transactions`,
        method: "GET",
        query: query,
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Transaction
     * @name GetTransactionDetails
     * @summary Get transaction details.
     * @request GET:/api/v1/transactions/{transaction_id}
     * @secure
     */
    getTransactionDetails: (transactionId: number, params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Transaction retrieved successfully" */
          message?: string;
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "INV/2021/10/1" */
            invoice_number?: string;
            /** @example 200000 */
            item_total_price?: number;
            /** @example 200000 */
            item_total_net_price?: number;
            /** @example 0 */
            total_voucher_price?: number;
            /** @example 200000 */
            amount?: number;
            status?: {
              /** @example 50 */
              id?: number;
              /** @example null */
              name?: string;
              /** @example "Selesai" */
              description?: string;
            };
            user?: {
              /** @example 1 */
              id?: number;
              /** @example "merchant" */
              name?: string;
              /** @example 3 */
              user_level?: number;
              /** @example "merchant@mail.com" */
              email?: string;
              /** @example "081234567890" */
              phone?: string;
              /** @example 1 */
              status?: number;
              /** @example "2023-11-26T12:36:58.000000Z" */
              created_at?: string;
              /** @example "2023-11-26T12:36:58.000000Z" */
              updated_at?: string;
            };
            /** @example [{"id":1,"payment_order":2,"amount":200000,"due_date":"03/12/2023","response":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","payment_token":1234567,"created_at":"26/11/2023 12:36:58","updated_at":"26/11/2023 12:36:58","status":{"id":1,"description":"Success"}}] */
            payments?: {
              /** @example 1 */
              id?: number;
              /** @example 2 */
              payment_order?: number;
              /** @example 200000 */
              amount?: number;
              /** @example "03/12/2023" */
              due_date?: string;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              response?: string;
              /** @example 1234567 */
              payment_token?: number;
              /** @example "26/11/2023 12:36:58" */
              created_at?: string;
              /** @example "26/11/2023 12:36:58" */
              updated_at?: string;
              status?: {
                /** @example 1 */
                id?: number;
                /** @example "Success" */
                description?: string;
              };
            }[];
            /** @example [{"id":1,"net_price":200000,"price":200000,"product_name":"product","product_description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","start_date":"16/10/2023","end_date":"17/10/2023","quantity":2,"note":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","product":{"id":1,"name":"product","description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","duration":1,"start_date":"16/10/2023","end_date":"17/10/2023","price":100000,"unit":"unit","discount":0,"thumbnail":"https://picsum.photos/200/200","address":"Jl. Test","coordinate":"123,123","max_person":10,"min_person":1,"note":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","is_published":0,"created_at":"2023-11-26T12:36:58.000000Z","updated_at":"2023-11-26T12:36:58.000000Z"},"status":{"id":2,"name":"1","desciption":"Confirmed by merchant"}}] */
            items?: {
              /** @example 1 */
              id?: number;
              /** @example 200000 */
              net_price?: number;
              /** @example 200000 */
              price?: number;
              /** @example "product" */
              product_name?: string;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              product_description?: string;
              /** @example "16/10/2023" */
              start_date?: string;
              /** @example "17/10/2023" */
              end_date?: string;
              /** @example 2 */
              quantity?: number;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              note?: string;
              product?: {
                /** @example 1 */
                id?: number;
                /** @example "product" */
                name?: string;
                /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
                description?: string;
                /** @example 1 */
                duration?: number;
                /** @example "16/10/2023" */
                start_date?: string;
                /** @example "17/10/2023" */
                end_date?: string;
                /** @example 100000 */
                price?: number;
                /** @example "unit" */
                unit?: string;
                /** @example 0 */
                discount?: number;
                /** @example "https://picsum.photos/200/200" */
                thumbnail?: string;
                /** @example "Jl. Test" */
                address?: string;
                /** @example "123,123" */
                coordinate?: string;
                /** @example 10 */
                max_person?: number;
                /** @example 1 */
                min_person?: number;
                /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
                note?: string;
                /** @example 0 */
                is_published?: number;
                /** @example "2023-11-26T12:36:58.000000Z" */
                created_at?: string;
                /** @example "2023-11-26T12:36:58.000000Z" */
                updated_at?: string;
              };
              status?: {
                /** @example 2 */
                id?: number;
                /** @example "1" */
                name?: string;
                /** @example "Confirmed by merchant" */
                desciption?: string;
              };
            }[];
          };
        },
        any
      >({
        path: `/api/v1/transactions/${transactionId}`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Order Item
     * @name GetAllMerchantsOrdersItems
     * @summary Get all merchant's order's items.
     * @request GET:/api/v1/merchants/me/items
     * @secure
     */
    getAllMerchantsOrdersItems: (
      query?: {
        /**
         * Item minimum quantity
         * @example 2
         */
        quantity_min?: number;
        /**
         * Item maximum quantity
         * @example 10
         */
        quantity_max?: number;
        /**
         * Item minimum start date (Y-m-d)
         * @example "2023-10-16"
         */
        start_date?: string;
        /**
         * Item maximum end date (Y-m-d)
         * @example "2023-10-20"
         */
        end_date?: string;
        /**
         * Order by (default: updated_at)
         * @example "updated_at"
         */
        order_by?: string;
        /**
         * Order direction (ASC or DESC) (default: DESC)
         * @example "DESC"
         */
        order_direction?: string;
        /**
         * Page size (default: 15)
         * @example 15
         */
        page_size?: number;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [{"id":19,"net_price":2249008,"price":2243232,"product_name":"est nobis","product_description":"Aspernatur suscipit autem odio at quia placeat et. Nam dignissimos accusantium atque aut. Porro eius officiis laboriosam eligendi. Molestias magni deserunt placeat rerum corrupti qui aspernatur.","start_date":"13/11/2023","end_date":"24/02/2023","quantity":8,"note":"Et labore ut sed et voluptatem assumenda.","status":{"id":3,"name":"2","desciption":"Rejected by merchant"}},{"id":3,"net_price":3199074,"price":3197274,"product_name":"molestiae nostrum","product_description":"Quidem suscipit nemo et laborum deleniti minus. Vero consectetur incidunt est. Reprehenderit nihil eligendi natus consequatur.","start_date":"22/10/2023","end_date":"15/04/2022","quantity":6,"note":"Quisquam dolorem dolor inventore.","status":{"id":3,"name":"2","desciption":"Rejected by merchant"}},{"id":1,"net_price":200000,"price":200000,"product_name":"product","product_description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","start_date":"16/10/2023","end_date":"17/10/2023","quantity":2,"note":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.","status":{"id":2,"name":"1","desciption":"Confirmed by merchant"}}] */
          data?: {
            /** @example 19 */
            id?: number;
            /** @example 2249008 */
            net_price?: number;
            /** @example 2243232 */
            price?: number;
            /** @example "est nobis" */
            product_name?: string;
            /** @example "Aspernatur suscipit autem odio at quia placeat et. Nam dignissimos accusantium atque aut. Porro eius officiis laboriosam eligendi. Molestias magni deserunt placeat rerum corrupti qui aspernatur." */
            product_description?: string;
            /** @example "13/11/2023" */
            start_date?: string;
            /** @example "24/02/2023" */
            end_date?: string;
            /** @example 8 */
            quantity?: number;
            /** @example "Et labore ut sed et voluptatem assumenda." */
            note?: string;
            status?: {
              /** @example 3 */
              id?: number;
              /** @example "2" */
              name?: string;
              /** @example "Rejected by merchant" */
              desciption?: string;
            };
          }[];
          links?: {
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/items?page=1" */
            first?: string;
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/items?page=1" */
            last?: string;
            /** @example null */
            prev?: string;
            /** @example null */
            next?: string;
          };
          meta?: {
            /** @example 1 */
            current_page?: number;
            /** @example 1 */
            from?: number;
            /** @example 1 */
            last_page?: number;
            /** @example [{"url":null,"label":"&laquo; Previous","active":false},{"url":"http://127.0.0.1:8000/api/v1/merchants/me/items?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}] */
            links?: {
              /** @example null */
              url?: string;
              /** @example "&laquo; Previous" */
              label?: string;
              /** @example false */
              active?: boolean;
            }[];
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/items" */
            path?: string;
            /** @example 15 */
            per_page?: number;
            /** @example 3 */
            to?: number;
            /** @example 3 */
            total?: number;
          };
        },
        any
      >({
        path: `/api/v1/merchants/me/items`,
        method: "GET",
        query: query,
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Order Item
     * @name GetOrderItemDetails
     * @summary Get order item details.
     * @request GET:/api/v1/items/{item_id}
     * @secure
     */
    getOrderItemDetails: (itemId: number, params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Item retrieved successfully" */
          message?: string;
          data?: {
            /** @example 1 */
            id?: number;
            /** @example 200000 */
            net_price?: number;
            /** @example 200000 */
            price?: number;
            /** @example "product" */
            product_name?: string;
            /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
            product_description?: string;
            /** @example "16/10/2023" */
            start_date?: string;
            /** @example "17/10/2023" */
            end_date?: string;
            /** @example 2 */
            quantity?: number;
            /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
            note?: string;
            product?: {
              /** @example 1 */
              id?: number;
              /** @example "product" */
              name?: string;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              description?: string;
              /** @example 1 */
              duration?: number;
              /** @example "16/10/2023" */
              start_date?: string;
              /** @example "17/10/2023" */
              end_date?: string;
              /** @example 100000 */
              price?: number;
              /** @example "unit" */
              unit?: string;
              /** @example 0 */
              discount?: number;
              /** @example "https://picsum.photos/200/200" */
              thumbnail?: string;
              /** @example "Jl. Test" */
              address?: string;
              /** @example "123,123" */
              coordinate?: string;
              /** @example 10 */
              max_person?: number;
              /** @example 1 */
              min_person?: number;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              note?: string;
              /** @example 0 */
              is_published?: number;
              /** @example "2023-11-26T12:36:58.000000Z" */
              created_at?: string;
              /** @example "2023-11-26T12:36:58.000000Z" */
              updated_at?: string;
            };
            transaction?: {
              /** @example 1 */
              id?: number;
              /** @example "INV/2021/10/1" */
              invoice_number?: string;
              /** @example 200000 */
              item_total_price?: number;
              /** @example 200000 */
              item_total_net_price?: number;
              /** @example 0 */
              total_voucher_price?: number;
              /** @example 200000 */
              amount?: number;
              status?: {
                /** @example 50 */
                id?: number;
                /** @example null */
                name?: string;
                /** @example "Selesai" */
                description?: string;
              };
            };
            status?: {
              /** @example 2 */
              id?: number;
              /** @example "1" */
              name?: string;
              /** @example "Confirmed by merchant" */
              desciption?: string;
            };
          };
        },
        any
      >({
        path: `/api/v1/items/${itemId}`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Order Item
     * @name UpdateOrderItemStatus
     * @summary Update order item status.
     * @request PUT:/api/v1/items/{item_id}
     * @secure
     */
    updateOrderItemStatus: (
      itemId: number,
      data: {
        /** @example "3" */
        status_id: 2 | 3;
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/items/${itemId}`,
        method: "PUT",
        body: data,
        secure: true,
        type: ContentType.Json,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Voucher
     * @name GetAllMerchantsVouchers
     * @summary Get all merchant's vouchers.
     * @request GET:/api/v1/merchants/me/vouchers
     * @secure
     */
    getAllMerchantsVouchers: (
      query?: {
        /**
         * Voucher type ID
         * @example 1
         */
        voucher_type_id?: number;
        /**
         * Voucher name (fuzzy search)
         * @example "Vouc"
         */
        name?: string;
        /**
         * Voucher code (fuzzy search)
         * @example "Vouc"
         */
        code?: string;
        /**
         * Voucher nominal
         * @example 10000
         */
        nominal?: number;
        /**
         * Voucher minimum start date (Y-m-d)
         * @example "2023-10-16"
         */
        start_date?: string;
        /**
         * Voucher maximum end date (Y-m-d)
         * @example "2023-10-20"
         */
        end_date?: string;
        /**
         * Voucher minimum transaction
         * @example 100000
         */
        min_transaction?: number;
        /**
         * Voucher maximum discount
         * @example 10000
         */
        max_discount?: number;
        /**
         * Voucher quota
         * @example 100
         */
        quota?: number;
        /**
         * Order by (default: updated_at)
         * @example "updated_at"
         */
        order_by?: string;
        /**
         * Order direction (ASC or DESC) (default: DESC)
         * @example "DESC"
         */
        order_direction?: string;
        /**
         * Page size (default: 15)
         * @example 15
         */
        page_size?: number;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [] */
          data?: any[];
          links?: {
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/vouchers?page=1" */
            first?: string;
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/vouchers?page=1" */
            last?: string;
            /** @example null */
            prev?: string;
            /** @example null */
            next?: string;
          };
          meta?: {
            /** @example 1 */
            current_page?: number;
            /** @example null */
            from?: string;
            /** @example 1 */
            last_page?: number;
            /** @example [{"url":null,"label":"&laquo; Previous","active":false},{"url":"http://127.0.0.1:8000/api/v1/merchants/me/vouchers?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}] */
            links?: {
              /** @example null */
              url?: string;
              /** @example "&laquo; Previous" */
              label?: string;
              /** @example false */
              active?: boolean;
            }[];
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/vouchers" */
            path?: string;
            /** @example 15 */
            per_page?: number;
            /** @example null */
            to?: string;
            /** @example 0 */
            total?: number;
          };
        },
        any
      >({
        path: `/api/v1/merchants/me/vouchers`,
        method: "GET",
        query: query,
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Voucher
     * @name CreateNewVoucher
     * @summary Create new voucher
     * @request POST:/api/v1/vouchers
     * @secure
     */
    createNewVoucher: (
      data: {
        /** @example "quod" */
        voucher_type_id: string;
        /** @example "nesciunt" */
        merchant_id: string;
        /** @example "iusto" */
        name: string;
        /** @example "iusto" */
        code: string;
        /** @example 0.8 */
        nominal: number;
        /**
         * Must be a valid date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>today</code>.
         * @example "2061-05-18"
         */
        start_date: string;
        /**
         * Must be a valid date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>start_date</code>.
         * @example "2081-04-09"
         */
        end_date: string;
        /**
         * Must be at least 0.
         * @example 17
         */
        min_transaction: number;
        /**
         * Must be at least 0. Must not be greater than 100.
         * @example 19
         */
        max_discount: number;
        /**
         * Must be at least 1.
         * @example 60
         */
        quota: number;
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/vouchers`,
        method: "POST",
        body: data,
        secure: true,
        type: ContentType.Json,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Voucher
     * @name GetAVoycherDetail
     * @summary Get a voycher detail
     * @request GET:/api/v1/vouchers/{voucher_id}
     * @secure
     */
    getAVoycherDetail: (voucherId: number, params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Voucher detail" */
          message?: string;
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "deserunt" */
            name?: string;
            /** @example "possimus" */
            code?: string;
            /** @example 153 */
            nominal?: number;
            /** @example "2012-06-07T00:43:27.000000Z" */
            start_date?: string;
            /** @example "2023-06-17T09:08:50.000000Z" */
            end_date?: string;
            /** @example 475 */
            min_transaction?: number;
            /** @example 14028 */
            max_discount?: number;
            /** @example 54363877 */
            quota?: number;
            voucher_type?: {
              /** @example 4 */
              id?: number;
              /** @example "Category" */
              name?: string;
              /** @example "App\Models\Category" */
              voucher_type_model?: string;
            };
            merchant?: {
              /** @example 1 */
              id?: number;
              /** @example "merchant" */
              name?: string;
              /** @example "https://picsum.photos/100/100" */
              logo?: string;
              /** @example 0 */
              is_highlight?: number;
              /** @example "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum." */
              notes?: string;
              /** @example "2023-11-26T12:36:58.000000Z" */
              created_at?: string;
              /** @example "2023-11-26T12:36:58.000000Z" */
              updated_at?: string;
            };
          };
        },
        any
      >({
        path: `/api/v1/vouchers/${voucherId}`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Voucher
     * @name UpdateVoucher
     * @summary Update voucher
     * @request PUT:/api/v1/vouchers/{voucher_id}
     * @secure
     */
    updateVoucher: (
      voucherId: number,
      data?: {
        /** @example "dicta" */
        name?: string;
        /** @example "officiis" */
        code?: string;
        /** @example 11627.3221959 */
        nominal?: number;
        /**
         * Must be a valid date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>today</code>.
         * @example "2057-01-06"
         */
        start_date?: string;
        /**
         * Must be a valid date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>start_date</code>.
         * @example "2084-10-20"
         */
        end_date?: string;
        /**
         * Must be at least 0.
         * @example 48
         */
        min_transaction?: number;
        /**
         * Must be at least 0. Must not be greater than 100.
         * @example 1
         */
        max_discount?: number;
        /**
         * Must be at least 1.
         * @example 31
         */
        quota?: number;
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/vouchers/${voucherId}`,
        method: "PUT",
        body: data,
        secure: true,
        type: ContentType.Json,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Review
     * @name GetAllMerchantsReviews
     * @summary Get all merchant's reviews.
     * @request GET:/api/v1/merchants/me/reviews
     * @secure
     */
    getAllMerchantsReviews: (
      query?: {
        /**
         * Review minimum rating
         * @example 2
         */
        rating_min?: number;
        /**
         * Review maximum rating
         * @example 5
         */
        rating_max?: number;
        /**
         * Review is replied
         * @example true
         */
        is_replied?: boolean;
        /**
         * Order by (default: updated_at)
         * @example "updated_at"
         */
        order_by?: string;
        /**
         * Order direction (ASC or DESC) (default: DESC)
         * @example "DESC"
         */
        order_direction?: string;
        /**
         * Page size (default: 15)
         * @example 15
         */
        page_size?: number;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [] */
          data?: any[];
          links?: {
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/reviews?page=1" */
            first?: string;
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/reviews?page=1" */
            last?: string;
            /** @example null */
            prev?: string;
            /** @example null */
            next?: string;
          };
          meta?: {
            /** @example 1 */
            current_page?: number;
            /** @example null */
            from?: string;
            /** @example 1 */
            last_page?: number;
            /** @example [{"url":null,"label":"&laquo; Previous","active":false},{"url":"http://127.0.0.1:8000/api/v1/merchants/me/reviews?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}] */
            links?: {
              /** @example null */
              url?: string;
              /** @example "&laquo; Previous" */
              label?: string;
              /** @example false */
              active?: boolean;
            }[];
            /** @example "http://127.0.0.1:8000/api/v1/merchants/me/reviews" */
            path?: string;
            /** @example 15 */
            per_page?: number;
            /** @example null */
            to?: string;
            /** @example 0 */
            total?: number;
          };
        },
        any
      >({
        path: `/api/v1/merchants/me/reviews`,
        method: "GET",
        query: query,
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Review
     * @name UpdateReviewsReply
     * @summary Update review's reply.
     * @request PUT:/api/v1/reviews/{review_id}
     * @secure
     */
    updateReviewsReply: (
      reviewId: number,
      data: {
        /** @example "molestiae" */
        reply: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/reviews/${reviewId}`,
        method: "PUT",
        body: data,
        secure: true,
        type: ContentType.Json,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Chat
     * @name GetAllChatRooms
     * @summary Get all chat rooms.
     * @request GET:/api/v1/chats
     * @secure
     */
    getAllChatRooms: (params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Suceesfully retrieved chat rooms" */
          message?: string;
          /** @example [{"id":1,"name":"Chat Room 1","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":6,"name":"Prof. Vernon Ortiz","user_level":2}],"latest_message":{"id":7,"message":"Mock Turtle. 'She can't explain MYSELF, I'm afraid, but you might knock, and I could.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:07:01.000000Z","sender":{"id":1,"name":"merchant"}}},{"id":2,"name":"Chat Room 2","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":4,"name":"Evie Tromp","user_level":2}],"latest_message":{"id":16,"message":"Her first idea was that you weren't to talk about cats or dogs either, if you hold it.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:17:01.000000Z","sender":{"id":4,"name":"Evie Tromp"}}},{"id":3,"name":"Chat Room 3","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":4,"name":"Evie Tromp","user_level":2}],"latest_message":{"id":73,"message":"As of my last knowledge update in January 2022, I don't have specific information about \"Langchain.\" It's possible that there have been developments or new information after that date.","is_read":false,"read_at":null,"created_at":"2023-11-26T16:13:38.000000Z","sender":{"id":1,"name":"merchant"}}},{"id":4,"name":"Chat Room 4","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":6,"name":"Prof. Vernon Ortiz","user_level":2}],"latest_message":{"id":28,"message":"Alice. 'Come on, then,' said the King: 'however.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T12:52:01.000000Z","sender":{"id":1,"name":"merchant"}}},{"id":5,"name":"Chat Room 5","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":6,"name":"Prof. Vernon Ortiz","user_level":2}],"latest_message":{"id":38,"message":"Alice replied.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:22:01.000000Z","sender":{"id":6,"name":"Prof. Vernon Ortiz"}}},{"id":6,"name":"Chat Room 6","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":5,"name":"Micheal Schuster III","user_level":2}],"latest_message":{"id":47,"message":"Queen. 'It proves nothing of the court,\" and I could show you our cat Dinah: I think you'd take a fancy to cats.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:17:01.000000Z","sender":{"id":1,"name":"merchant"}}},{"id":7,"name":"Chat Room 7","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":5,"name":"Micheal Schuster III","user_level":2}],"latest_message":{"id":54,"message":"YOUR business, Two!' said Seven.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:07:01.000000Z","sender":{"id":1,"name":"merchant"}}},{"id":8,"name":"Chat Room 8","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":7,"name":"Mrs. Lisa Kub","user_level":2}],"latest_message":{"id":63,"message":"Alice; not that she.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:17:01.000000Z","sender":{"id":1,"name":"merchant"}}},{"id":9,"name":"Chat Room 9","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":4,"name":"Evie Tromp","user_level":2}],"latest_message":{"id":67,"message":"Alice, 'it's very easy to take the hint; but the.","is_read":true,"read_at":"2023-11-26T12:37:02.000000Z","created_at":"2023-11-26T12:52:02.000000Z","sender":{"id":1,"name":"merchant"}}},{"id":10,"name":"Chat Room 10","new_message_count":0,"participants":[{"id":1,"name":"merchant","user_level":3},{"id":7,"name":"Mrs. Lisa Kub","user_level":2}],"latest_message":{"id":71,"message":"Alice, surprised at this, that she began fancying the sort of use in waiting by the way of expecting.","is_read":true,"read_at":"2023-11-26T12:37:02.000000Z","created_at":"2023-11-26T12:52:02.000000Z","sender":{"id":7,"name":"Mrs. Lisa Kub"}}}] */
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "Chat Room 1" */
            name?: string;
            /** @example 0 */
            new_message_count?: number;
            /** @example [{"id":1,"name":"merchant","user_level":3},{"id":6,"name":"Prof. Vernon Ortiz","user_level":2}] */
            participants?: {
              /** @example 1 */
              id?: number;
              /** @example "merchant" */
              name?: string;
              /** @example 3 */
              user_level?: number;
            }[];
            latest_message?: {
              /** @example 7 */
              id?: number;
              /** @example "Mock Turtle. 'She can't explain MYSELF, I'm afraid, but you might knock, and I could." */
              message?: string;
              /** @example true */
              is_read?: boolean;
              /** @example "2023-11-26T12:37:01.000000Z" */
              read_at?: string;
              /** @example "2023-11-26T13:07:01.000000Z" */
              created_at?: string;
              sender?: {
                /** @example 1 */
                id?: number;
                /** @example "merchant" */
                name?: string;
              };
            };
          }[];
        },
        any
      >({
        path: `/api/v1/chats`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Chat
     * @name GetChatRoomById
     * @summary Get chat room by id.
     * @request GET:/api/v1/chats/{chat_id}
     * @secure
     */
    getChatRoomById: (chatId: number, params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Suceesfully retrieved chat room" */
          message?: string;
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "Chat Room 1" */
            name?: string;
            /** @example [{"id":7,"message":"Mock Turtle. 'She can't explain MYSELF, I'm afraid, but you might knock, and I could.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:07:01.000000Z","sender":{"id":1,"name":"merchant"}},{"id":6,"message":"Oh, I shouldn't want YOURS: I.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T13:02:01.000000Z","sender":{"id":1,"name":"merchant"}},{"id":5,"message":"Queen turned angrily away from her as hard as he.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T12:57:01.000000Z","sender":{"id":6,"name":"Prof. Vernon Ortiz"}},{"id":4,"message":"Oh dear! I wish I hadn't cried so much!' said Alice, a little pattering of footsteps in the direction.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T12:52:01.000000Z","sender":{"id":6,"name":"Prof. Vernon Ortiz"}},{"id":3,"message":"Oh, how I wish I could say if I chose,' the Duchess said in a sulky tone; 'Seven jogged my elbow.' On which Seven.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T12:47:01.000000Z","sender":{"id":1,"name":"merchant"}},{"id":2,"message":"I beg your pardon,' said Alice indignantly. 'Let me.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T12:42:01.000000Z","sender":{"id":6,"name":"Prof. Vernon Ortiz"}},{"id":1,"message":"Mock Turtle went on again:-- 'You may go,' said the King said gravely, 'and go on with.","is_read":true,"read_at":"2023-11-26T12:37:01.000000Z","created_at":"2023-11-26T12:37:01.000000Z","sender":{"id":6,"name":"Prof. Vernon Ortiz"}}] */
            messages?: {
              /** @example 7 */
              id?: number;
              /** @example "Mock Turtle. 'She can't explain MYSELF, I'm afraid, but you might knock, and I could." */
              message?: string;
              /** @example true */
              is_read?: boolean;
              /** @example "2023-11-26T12:37:01.000000Z" */
              read_at?: string;
              /** @example "2023-11-26T13:07:01.000000Z" */
              created_at?: string;
              sender?: {
                /** @example 1 */
                id?: number;
                /** @example "merchant" */
                name?: string;
              };
            }[];
            /** @example 0 */
            new_message_count?: number;
            /** @example [{"id":1,"name":"merchant","user_level":3},{"id":6,"name":"Prof. Vernon Ortiz","user_level":2}] */
            participants?: {
              /** @example 1 */
              id?: number;
              /** @example "merchant" */
              name?: string;
              /** @example 3 */
              user_level?: number;
            }[];
            latest_message?: {
              /** @example 7 */
              id?: number;
              /** @example "Mock Turtle. 'She can't explain MYSELF, I'm afraid, but you might knock, and I could." */
              message?: string;
              /** @example true */
              is_read?: boolean;
              /** @example "2023-11-26T12:37:01.000000Z" */
              read_at?: string;
              /** @example "2023-11-26T13:07:01.000000Z" */
              created_at?: string;
              sender?: {
                /** @example 1 */
                id?: number;
                /** @example "merchant" */
                name?: string;
              };
            };
          };
        },
        any
      >({
        path: `/api/v1/chats/${chatId}`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Chat
     * @name CreateNewMessage
     * @summary Create new message.
     * @request POST:/api/v1/chats/{chat_id}
     * @secure
     */
    createNewMessage: (
      chatId: number,
      data: {
        /** @example "enim" */
        message: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<any, any>({
        path: `/api/v1/chats/${chatId}`,
        method: "POST",
        body: data,
        secure: true,
        type: ContentType.Json,
        ...params,
      }),

    /**
     * No description
     *
     * @tags Public
     * @name GetAllCities
     * @summary Get all cities.
     * @request GET:/api/v1/cities
     */
    getAllCities: (
      query?: {
        /**
         * The name of the city. (can be a substring)
         * @example "Ja"
         */
        name?: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [{"id":4,"name":"Kabupaten Aceh Jaya","image":"https://via.placeholder.com/640x480.png/006655?text=quod","is_highlighted":1,"province":{"id":1,"name":"Aceh"}},{"id":17,"name":"Kabupaten Pidie Jaya","image":"https://via.placeholder.com/640x480.png/0066dd?text=consequuntur","is_highlighted":1,"province":{"id":1,"name":"Aceh"}},{"id":49,"name":"Kota Binjai","image":"https://via.placeholder.com/640x480.png/0099ee?text=alias","is_highlighted":1,"province":{"id":2,"name":"Sumatra Utara"}},{"id":71,"name":"Kota Padang Panjang","image":"https://via.placeholder.com/640x480.png/002277?text=illum","is_highlighted":0,"province":{"id":3,"name":"Sumatra Barat"}},{"id":92,"name":"Kabupaten Muaro Jambi","image":"https://via.placeholder.com/640x480.png/00ccbb?text=ipsum","is_highlighted":1,"province":{"id":5,"name":"Jambi"}},{"id":94,"name":"Kabupaten Tanjung Jabung Barat","image":"https://via.placeholder.com/640x480.png/00aa77?text=aspernatur","is_highlighted":1,"province":{"id":5,"name":"Jambi"}},{"id":95,"name":"Kabupaten Tanjung Jabung Timur","image":"https://via.placeholder.com/640x480.png/0088cc?text=delectus","is_highlighted":0,"province":{"id":5,"name":"Jambi"}},{"id":97,"name":"Kota Jambi","image":"https://via.placeholder.com/640x480.png/006644?text=eius","is_highlighted":0,"province":{"id":5,"name":"Jambi"}},{"id":123,"name":"Kabupaten Rejang Lebong","image":"https://via.placeholder.com/640x480.png/008833?text=dolorem","is_highlighted":0,"province":{"id":7,"name":"Bengkulu"}},{"id":156,"name":"Kota Jakarta Barat","image":"https://via.placeholder.com/640x480.png/00ee44?text=et","is_highlighted":0,"province":{"id":11,"name":"Daerah Khusus Ibukota Jakarta"}},{"id":157,"name":"Kota Jakarta Pusat","image":"https://via.placeholder.com/640x480.png/005511?text=quia","is_highlighted":0,"province":{"id":11,"name":"Daerah Khusus Ibukota Jakarta"}},{"id":158,"name":"Kota Jakarta Selatan","image":"https://via.placeholder.com/640x480.png/008888?text=autem","is_highlighted":0,"province":{"id":11,"name":"Daerah Khusus Ibukota Jakarta"}},{"id":159,"name":"Kota Jakarta Timur","image":"https://via.placeholder.com/640x480.png/00ddbb?text=voluptatem","is_highlighted":1,"province":{"id":11,"name":"Daerah Khusus Ibukota Jakarta"}},{"id":160,"name":"Kota Jakarta Utara","image":"https://via.placeholder.com/640x480.png/004466?text=ducimus","is_highlighted":0,"province":{"id":11,"name":"Daerah Khusus Ibukota Jakarta"}},{"id":172,"name":"Kabupaten Majalengka","image":"https://via.placeholder.com/640x480.png/006644?text=itaque","is_highlighted":1,"province":{"id":12,"name":"Jawa Barat"}},{"id":180,"name":"Kota Banjar","image":"https://via.placeholder.com/640x480.png/0066ff?text=architecto","is_highlighted":0,"province":{"id":12,"name":"Jawa Barat"}},{"id":188,"name":"Kabupaten Banjarnegara","image":"https://via.placeholder.com/640x480.png/0066cc?text=recusandae","is_highlighted":0,"province":{"id":13,"name":"Jawa Tengah"}},{"id":238,"name":"Kabupaten Lumajang","image":"https://via.placeholder.com/640x480.png/0000aa?text=tenetur","is_highlighted":0,"province":{"id":15,"name":"Jawa Timur"}},{"id":344,"name":"Kabupaten Banjar","image":"https://via.placeholder.com/640x480.png/0099ff?text=non","is_highlighted":1,"province":{"id":22,"name":"Kalimantan Selatan"}},{"id":354,"name":"Kota Banjarbaru","image":"https://via.placeholder.com/640x480.png/00cc88?text=earum","is_highlighted":1,"province":{"id":22,"name":"Kalimantan Selatan"}},{"id":355,"name":"Kota Banjarmasin","image":"https://via.placeholder.com/640x480.png/0033bb?text=at","is_highlighted":1,"province":{"id":22,"name":"Kalimantan Selatan"}},{"id":362,"name":"Kabupaten Penajam Paser Utara","image":"https://via.placeholder.com/640x480.png/002255?text=exercitationem","is_highlighted":1,"province":{"id":23,"name":"Kalimantan Timur"}},{"id":414,"name":"Kabupaten Sinjai","image":"https://via.placeholder.com/640x480.png/003311?text=et","is_highlighted":0,"province":{"id":27,"name":"Sulawesi Selatan"}},{"id":417,"name":"Kabupaten Tana Toraja","image":"https://via.placeholder.com/640x480.png/008899?text=quia","is_highlighted":1,"province":{"id":27,"name":"Sulawesi Selatan"}},{"id":418,"name":"Kabupaten Toraja Utara","image":"https://via.placeholder.com/640x480.png/0000cc?text=et","is_highlighted":1,"province":{"id":27,"name":"Sulawesi Selatan"}},{"id":478,"name":"Kabupaten Intan Jaya","image":"https://via.placeholder.com/640x480.png/0000dd?text=perspiciatis","is_highlighted":1,"province":{"id":33,"name":"Papua"}},{"id":479,"name":"Kabupaten Jayapura","image":"https://via.placeholder.com/640x480.png/006655?text=consequatur","is_highlighted":0,"province":{"id":33,"name":"Papua"}},{"id":480,"name":"Kabupaten Jayawijaya","image":"https://via.placeholder.com/640x480.png/005555?text=rerum","is_highlighted":1,"province":{"id":33,"name":"Papua"}},{"id":483,"name":"Kabupaten Lanny Jaya","image":"https://via.placeholder.com/640x480.png/0033bb?text=quo","is_highlighted":1,"province":{"id":33,"name":"Papua"}},{"id":494,"name":"Kabupaten Puncak Jaya","image":"https://via.placeholder.com/640x480.png/009933?text=blanditiis","is_highlighted":0,"province":{"id":33,"name":"Papua"}},{"id":501,"name":"Kota Jayapura","image":"https://via.placeholder.com/640x480.png/0044dd?text=nam","is_highlighted":0,"province":{"id":33,"name":"Papua"}},{"id":508,"name":"Kabupaten Raja Ampat","image":"https://via.placeholder.com/640x480.png/00ff99?text=deserunt","is_highlighted":1,"province":{"id":34,"name":"Papua Barat"}}] */
          data?: {
            /** @example 4 */
            id?: number;
            /** @example "Kabupaten Aceh Jaya" */
            name?: string;
            /** @example "https://via.placeholder.com/640x480.png/006655?text=quod" */
            image?: string;
            /** @example 1 */
            is_highlighted?: number;
            province?: {
              /** @example 1 */
              id?: number;
              /** @example "Aceh" */
              name?: string;
            };
          }[];
        },
        any
      >({
        path: `/api/v1/cities`,
        method: "GET",
        query: query,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Public
     * @name GetAllProvinces
     * @summary Get all provinces.
     * @request GET:/api/v1/provinces
     */
    getAllProvinces: (
      query?: {
        /**
         * The name of the province. (can be a substring)
         * @example "Jawa"
         */
        name?: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [{"id":12,"name":"Jawa Barat","country":{"id":1,"name":"Indonesia","flag":"https://via.placeholder.com/640x480.png/00aa11?text=voluptatum"}},{"id":13,"name":"Jawa Tengah","country":{"id":1,"name":"Indonesia","flag":"https://via.placeholder.com/640x480.png/00aa11?text=voluptatum"}},{"id":15,"name":"Jawa Timur","country":{"id":1,"name":"Indonesia","flag":"https://via.placeholder.com/640x480.png/00aa11?text=voluptatum"}}] */
          data?: {
            /** @example 12 */
            id?: number;
            /** @example "Jawa Barat" */
            name?: string;
            country?: {
              /** @example 1 */
              id?: number;
              /** @example "Indonesia" */
              name?: string;
              /** @example "https://via.placeholder.com/640x480.png/00aa11?text=voluptatum" */
              flag?: string;
            };
          }[];
        },
        any
      >({
        path: `/api/v1/provinces`,
        method: "GET",
        query: query,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Public
     * @name GetAllCountries
     * @summary Get all countries.
     * @request GET:/api/v1/countries
     */
    getAllCountries: (
      query?: {
        /**
         * The name of the country. (can be a substring)
         * @example "Ind"
         */
        name?: string;
      },
      params: RequestParams = {},
    ) =>
      this.request<
        {
          /** @example [{"id":1,"name":"Indonesia","flag":"https://via.placeholder.com/640x480.png/00aa11?text=voluptatum"}] */
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "Indonesia" */
            name?: string;
            /** @example "https://via.placeholder.com/640x480.png/00aa11?text=voluptatum" */
            flag?: string;
          }[];
        },
        any
      >({
        path: `/api/v1/countries`,
        method: "GET",
        query: query,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Public
     * @name GetAllFacilities
     * @summary Get all facilities.
     * @request GET:/api/v1/facilities
     * @secure
     */
    getAllFacilities: (params: RequestParams = {}) =>
      this.request<
        {
          /** @example [{"id":1,"name":"wifi","icon":"https://via.placeholder.com/640x480.png/0044dd?text=pariatur"},{"id":2,"name":"parkir","icon":"https://via.placeholder.com/640x480.png/00ff33?text=doloribus"},{"id":3,"name":"ac","icon":"https://via.placeholder.com/640x480.png/009977?text=quos"},{"id":4,"name":"tv","icon":"https://via.placeholder.com/640x480.png/0099bb?text=mollitia"},{"id":5,"name":"kamar mandi dalam","icon":"https://via.placeholder.com/640x480.png/00bb88?text=omnis"},{"id":6,"name":"kamar mandi luar","icon":"https://via.placeholder.com/640x480.png/00aaee?text=odio"}] */
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "wifi" */
            name?: string;
            /** @example "https://via.placeholder.com/640x480.png/0044dd?text=pariatur" */
            icon?: string;
          }[];
        },
        any
      >({
        path: `/api/v1/facilities`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * No description
     *
     * @tags Public
     * @name GetAllProductCategories
     * @summary Get all product categories.
     * @request GET:/api/v1/categories
     * @secure
     */
    getAllProductCategories: (params: RequestParams = {}) =>
      this.request<
        {
          /** @example true */
          status?: boolean;
          /** @example "Product categories" */
          message?: string;
          /** @example [{"id":1,"name":"non","icon":"https://via.placeholder.com/640x480.png/004422?text=aut","sub_categories":[{"id":1,"name":"autem","icon":"https://via.placeholder.com/640x480.png/005588?text=odit"},{"id":2,"name":"id","icon":"https://via.placeholder.com/640x480.png/0077cc?text=quis"}]},{"id":2,"name":"ex","icon":"https://via.placeholder.com/640x480.png/000099?text=soluta","sub_categories":[{"id":3,"name":"amet","icon":"https://via.placeholder.com/640x480.png/00dd33?text=commodi"},{"id":4,"name":"soluta","icon":"https://via.placeholder.com/640x480.png/0088ff?text=cupiditate"}]},{"id":3,"name":"officia","icon":"https://via.placeholder.com/640x480.png/00ee77?text=rem","sub_categories":[{"id":5,"name":"explicabo","icon":"https://via.placeholder.com/640x480.png/0077ff?text=aspernatur"},{"id":6,"name":"dignissimos","icon":"https://via.placeholder.com/640x480.png/00bbff?text=et"}]},{"id":4,"name":"consectetur","icon":"https://via.placeholder.com/640x480.png/0066bb?text=maiores","sub_categories":[{"id":7,"name":"sint","icon":"https://via.placeholder.com/640x480.png/002244?text=laudantium"},{"id":8,"name":"ea","icon":"https://via.placeholder.com/640x480.png/00bb55?text=et"}]},{"id":5,"name":"ut","icon":"https://via.placeholder.com/640x480.png/009933?text=necessitatibus","sub_categories":[{"id":9,"name":"quasi","icon":"https://via.placeholder.com/640x480.png/0088cc?text=mollitia"},{"id":10,"name":"voluptatibus","icon":"https://via.placeholder.com/640x480.png/001199?text=distinctio"}]}] */
          data?: {
            /** @example 1 */
            id?: number;
            /** @example "non" */
            name?: string;
            /** @example "https://via.placeholder.com/640x480.png/004422?text=aut" */
            icon?: string;
            /** @example [{"id":1,"name":"autem","icon":"https://via.placeholder.com/640x480.png/005588?text=odit"},{"id":2,"name":"id","icon":"https://via.placeholder.com/640x480.png/0077cc?text=quis"}] */
            sub_categories?: {
              /** @example 1 */
              id?: number;
              /** @example "autem" */
              name?: string;
              /** @example "https://via.placeholder.com/640x480.png/005588?text=odit" */
              icon?: string;
            }[];
          }[];
        },
        any
      >({
        path: `/api/v1/categories`,
        method: "GET",
        secure: true,
        format: "json",
        ...params,
      }),

    /**
     * @description This route will be used if the requested route is not found.
     *
     * @tags Fallback
     * @name FallbackRoute
     * @summary Fallback route
     * @request GET:/api/{fallbackPlaceholder}
     */
    fallbackRoute: (fallbackPlaceholder: string, params: RequestParams = {}) =>
      this.request<
        any,
        {
          /** @example "Endpoint not found" */
          message?: string;
        }
      >({
        path: `/api/${fallbackPlaceholder}`,
        method: "GET",
        ...params,
      }),
  };
}
