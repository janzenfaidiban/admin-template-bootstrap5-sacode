# API **</>>** SaCode Weekend

## Dokumentasi
**Endpoint** <p id="top">:
| Method | URI                         | KETERANGAN                            |
| ------ | --------------------------- | ------------------------------------- |
| GET    | [api/weekend](#get)         | Menampilkan Data Weekens              |
| POST   | [api/weekend](#post)        | Menambah Data Weekens                 |
| GET    | [api/weekend/:id](#byid)    | Mengambil Data Weekens Berdasarkan Id |
| PUT    | [api/weekend/:id](#put)     | Mengubah Data Weekens                 |
| DELETE | [api/weekend/:id](#delete)  | Menghapus Data Weekens                |
| GET    | [api/member](#get-m)        | Menampilkan Data Members              |
| POST   | [api/member](#post-m)       | Menambah Data Members                 |
| GET    | [api/member/:id](#byid-m)   | Mengambil Data Members Berdasarkan Id |
| PUT    | [api/member/:id](#put-m)    | Mengubah Data Members                 |
| DELETE | [api/member/:id](#delete-m) | Menghapus Data Members                |

**Base Url** :
```
http://127.0.0.1:8000/
```

---
### Menampilkan Data Weekend <p id="get"> 
[to-top](#top)
- *Request*
    ```
    api/weekend/
    ```

- *Response*
    ```json
    {
        "success": true,
        "message": "List Data Weekends",
        "data": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "topic": "back end restful api in laravel",
                    "member_id": 2,
                    "date": "05-06-2022",
                    "firts_time": "18:00",
                    "last_time": "20:00",
                    "created_at": "2022-06-04T17:08:57.000000Z",
                    "updated_at": "2022-06-04T17:08:57.000000Z",
                    "member": {
                        "id": 2,
                        "name": "imanuel nauw",
                        "job": "tukan ketik-ketik"
                    }
                }
            ],
            "first_page_url": "http://127.0.0.1:8000/api/weekend?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/weekend?page=1",
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://127.0.0.1:8000/api/weekend?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/weekend",
            "per_page": 5,
            "prev_page_url": null,
            "to": 1,
            "total": 1
        }
    }
    ```
---
### Menambah Data Weekend <p id="post"> 
[to-top](#top)
- *Request*
    ```
    api/weekend/
    ```

    Body Form Data
    | key        | value                           |
    | ---------- | ------------------------------- |
    | topic      | back end restful api in laravel |
    | member_id  | 2                               |
    | date       | 05-06-2022                      |
    | firts_time | 18:00                           |
    | last_time  | 20:00                           |

- *Response*
    ```json
    {
        "message": "Successfully posted"
    }
    ```

---
### Mengambil Data Weekend Berdasarkan Id <p id="byid"> 
[to-top](#top)
- *Request*
    ```
    api/weekend/1
    ```

- *Response*
    ```json
    {
        "success": true,
        "message": "Data Weekend Ditemukan!",
        "data": {
            "id": 1,
            "topic": "back end restful api in laravel",
            "member_id": 2,
            "date": "05-06-2022",
            "firts_time": "18:00",
            "last_time": "20:00",
            "created_at": "2022-06-04T17:08:57.000000Z",
            "updated_at": "2022-06-04T17:08:57.000000Z",
            "member": {
                "id": 2,
                "name": "imanuel nauw",
                "job": "tukan ketik-ketik"
            }
        }
    }
    ```
---
### Mengubah Data Weekend <p id="put"> 
[to-top](#top)
- *Request*
    ```
    api/weekend/1
    ```

    Body Form Data
    | key        | value                           |
    | ---------- | ------------------------------- |
    | topic      | back end restful api in laravel |
    | member_id  | 2                               |
    | date       | 15-06-2022                      |
    | firts_time | 18:00                           |
    | last_time  | 20:00                           |

- *Response*
    ```json
    {
        "message": "Successfully Updated"
    }
    ```
---
### Menghapus Data Weekend <p id="delete"> 
[to-top](#top)
- *Request*
    ```
    api/weekend/1
    ```

- *Response*
    ```json
    {
        "message": "Successfully Deleted"
    }
    ```


---
### Menampilkan Data Members <p id="get-m"> 
[to-top](#top)
- *Request*
    ```
    api/member/
    ```

- *Response*
    ```json
    {
        "success": true,
        "message": "List Data Members",
        "data": {
            "current_page": 1,
            "data": [
                {
                    "id": 2,
                    "name": "imanuel nauw",
                    "job": "tukan ketik-ketik",
                    "about": "i'm a the tukan ketik-ketik",
                    "image": "TjKV2mD4E85u8Bqzgj5sCL5tmFIjggPQmFUnTlAi.jpg",
                    "created_at": "2022-06-04T17:31:13.000000Z",
                    "updated_at": "2022-06-04T17:31:13.000000Z"
                }
            ],
            "first_page_url": "http://127.0.0.1:8000/api/member?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/member?page=1",
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://127.0.0.1:8000/api/member?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/member",
            "per_page": 5,
            "prev_page_url": null,
            "to": 1,
            "total": 1
        }
    }
    ```
---
### Menambah Data Members <p id="post-m"> 
[to-top](#top)
- *Request*
    ```
    api/member/
    ```

    Body Form Data
    | key   | value                       | ket  |
    | ----- | --------------------------- | ---- |
    | name  | imanuel nauw                | text |
    | job   | tukang ketik-ketik          | text |
    | about | i'm a the tukan ketik-ketik | text |
    | image | image.jpg                   | file |

- *Response*
    ```json
    {
        "message": "Successfully posted"
    }
    ```

---
### Mengambil Data Members Berdasarkan Id <p id="byid-m"> 
[to-top](#top)
- *Request*
    ```
    api/member/2
    ```

- *Response*
    ```json
    {
        "success": true,
        "message": "Data Member Ditemukan!",
        "data": {
            "id": 2,
            "name": "imanuel nauw",
            "job": "tukan ketik-ketik",
            "about": "i'm a the tukan ketik-ketik",
            "image": "TjKV2mD4E85u8Bqzgj5sCL5tmFIjggPQmFUnTlAi.jpg",
            "created_at": "2022-06-04T17:31:13.000000Z",
            "updated_at": "2022-06-04T17:31:13.000000Z"
        }
    }
    ```
---
### Mengubah Data Members <p id="put-m"> 
[to-top](#top)
- *Request*
    ```
    api/member/2
    ```

    Body Form Data
    | key   | value                 | ket  |
    | ----- | --------------------- | ---- |
    | name  | imanuel               | text |
    | job   | tukang perbaikan      | text |
    | about | tukang perbaikan kode | text |
    | image | image.jpg             | file |

- *Response*
    ```json
    {
        "message": "Successfully Updated"
    }
    ```
---
### Menghapus Data Members <p id="delete-m"> 
[to-top](#top)
- *Request*
    ```
    api/member/2
    ```

- *Response*
    ```json
    {
        "message": "Successfully Deleted"
    }
    ```

---
Oleh [Imanuel Nauw]()
