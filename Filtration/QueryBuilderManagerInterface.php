<?php
/**
 * @author Sergey Hashimov
 * Date: 12.07.19
 * Time: 16:41
 */

namespace Gns\GnsFilterBundle\Filtration;

use Doctrine\ORM\QueryBuilder;

/**
 * Interface QueryBuilderManagerInterface
 * 
 */
interface QueryBuilderManagerInterface
{
    /**
     * @param QueryBuilder $queryBuilder
     */
    function apply(QueryBuilder $queryBuilder) :void;
}