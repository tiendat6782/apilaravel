import Brand from "@/components/section/home/Brand";
import Cover from "@/components/section/home/Cover";
import PopularProduct from "@/components/section/home/PopularProduct";
import ProductCategory from "@/components/section/home/ProductCategory";

import { SectionBreaker } from "@/components/shared/Breaker";

export default function Home() {
  return (
    <>
      <Cover />
      <Brand />
      <SectionBreaker />
      <ProductCategory />
      <SectionBreaker />
      <PopularProduct />
    </>
  );
}
