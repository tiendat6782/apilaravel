import { ContentBreaker } from "@/components/shared/Breaker";
import ProductCard from "@/components/shared/card/ProductCard";
import ProductGrid from "@/components/shared/grid/ProductGrid";
import Filters from "@/components/shared/search/FIlters";
import GlobalFilters from "@/components/shared/search/GlobalFilters";
import LocalSearch from "@/components/shared/search/LocalSearch";
import { getProducts } from "@/lib/action/product.action";
import React from "react";

const Page = async () => {
  const res = await getProducts();
  console.log(res);
  return (
    <>
      <LocalSearch />
      <GlobalFilters />
      <div className="flex_between border_b_primary relative gap-2">
        <Filters />
        <p className="text_secondary text-xs font-semibold">
          Tìm thấy <span className="text-primary">20</span> sản phẩm
        </p>
      </div>
      <ContentBreaker />
      <ProductGrid>
        {res &&
          res.data.map((product) => (
            <ProductCard price={product.price} name={product.name} key={product.id} id = {product.id} imgSrc={product.image} />
          ))}
      </ProductGrid>
    </>
  );
};

export default Page;
