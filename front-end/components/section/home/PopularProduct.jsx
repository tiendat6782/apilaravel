import { ContentBreaker } from "@/components/shared/Breaker";
import ProductCard from "@/components/shared/card/ProductCard";
import ProductGrid from "@/components/shared/grid/ProductGrid";
import { Button } from "@/components/ui/button";
import { ChevronLeft, ChevronRight } from "lucide-react";
import React from "react";

const PopularProduct = () => {
  return (
    <>
      <div className="flex_between">
        <p className="text-xl font-semibold">
          Phổ biến{" "}
          <span className="text_tertiary ml-3 text-xs uppercase">shop</span>
        </p>
        <div className="flex_start">
          <Button className="background_primary" variant="icon" size="icon">
            <ChevronLeft className="text_primary" />
          </Button>
          <Button className="background_primary" variant="icon" size="icon">
            <ChevronRight className="text_primary" />
          </Button>
        </div>
      </div>
      <ContentBreaker />
      <ProductGrid>
        <ProductCard />
        <ProductCard />
        <ProductCard />
      </ProductGrid>
    </>
  );
};

export default PopularProduct;
