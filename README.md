**Knp pagination wrapper accessing filter & sort paginated collections of entities**

**Instalation**

```$xslt
composer require Gns/data-filter-bundle "1.0"
```

**Configuration**

```$xslt
Gns_filter:
    checkers_enabled: # bool (default true) Enables prop availability check for filter & sort.
    default_operator: # string (default like) Defines default operator when absent.
    default_order_direction: # enum (ASC,DESC) (default ASC) Defines default order direction when absent.
```
**Web documentation**

```$xslt
Include below gonfig in your dev rotes

gns_data_filter_doc:
  resource: "@GnsFilterBundle/Controller"
  prefix: /gns

https://hostname:port/gns/data-filter
```


**Collection filters usage**
```$xslt
{
    filter:{
        associationNameA: {
            filedName: 'value'
        },
        associationNameB: {
            filedName: {
                operator: 'eq'
                value: 'value'
            }
        },
        associationNameC: {
            filedName: {
                value: 'value' // If no operator defined then triggers default operator - like
            }
        }, 
        associationNameD: {
            associationNameA: {
                associationNameB:{
                    filedName{
                         value: 'value' // If no operator defined then triggers default operator - like
                    }
                }
            }
        }, 
    },
    cfFilter:[
       0:[ // Disjunction query must be an array on indexed arrays of definitions
            associationNameA: {
                filedName: 'value'
            },
            associationNameB: {
                filedName: {
                    operator: 'eq'
                    value: 'value'
                }
            },
            associationNameC: {
                filedName: {
                    value: 'value' // If no operator defined then triggers default operator - like
                }
            },
            associationNameD: {
                associationNameA: {
                    associationNameB:{
                        filedName:{
                             value: 'value' // If no operator defined then triggers default operator - like
                        }
                    }
                }
            }, 
        ], 1:[...], 2:[...]    
    ],
    order:{
        associationNameA: {
            filedName: 'ASC'
        },
        associationNameB: {
            filedName: 'DESC'
        },
        associationNameC: {
            filedName: 'DESC'
        }, 
        associationNameD: {
            associationNameA: {
                associationNameB:{
                    filedName:'ASC'
                }
            }
        }, 
    },
}
```
Allowed operators
```$xslt
__________________________________________________________________________
|              |                                                         |   
|    'eq'      |       Equal (=)                                         |
|______________|_________________________________________________________|
|              |                                                         |
|    'neq'     |       Not equal (<>)                                    |
|______________|_________________________________________________________|
|              |                                                         |
|    'lt'      |       Less then (<)                                     |
|______________|_________________________________________________________|
|              |                                                         |
|    'lte'     |       Less than or equal (<=)                           |
|______________|_________________________________________________________|
|              |                                                         |
|    'ltel     |       Less than or equal (<= with time to 23:59:59)     |
|______________|_________________________________________________________|
|              |                                                         |
|    'gt'      |       Greater than (>)                                  |
|______________|_________________________________________________________|
|              |                                                         |
|    'gte'     |       Greater than or equal (>=)                        |
|______________|_________________________________________________________|
|              |                                                         |
|    'gtef     |       Greater than or equal (>= with time to 00:00:00)  |
|______________|_________________________________________________________|
|              |                                                         |
|    'in'      |       In (IN delimiter "|")                             |
|______________|_________________________________________________________|
|              |                                                         |
|    'nin'     |       Not in (NOT IN delimiter "|")                     |
|______________|_________________________________________________________|
|              |                                                         |
|    'like     |       Like (LIKE)                                       |
|______________|_________________________________________________________|
|              |                                                         |
|  'not_like'  |       Not like (NOT LIKE)                               |
|______________|_________________________________________________________|
|              |                                                         |
|    'bwn'     |       Between (BETWEEN)                                 |
|______________|_________________________________________________________|
|              |                                                         |
|  'not_bwn'   |       Not between (NOT BETWEEN)                         |
|______________|_________________________________________________________|
|              |                                                         |
|'hv_count_eq' |       Having count (HAVING COUNT(t.f) = :count)         | 
|______________|_________________________________________________________|
|              |                                                         |
|  'is_null'   |       Is Null (t.f IS NULL)                             | 
|______________|_________________________________________________________|
|              |                                                         |
| 'isnt_null'  |       Is not Null (t.f IS NOT NULL)                     | 
|______________|_________________________________________________________|
```