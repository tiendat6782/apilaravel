import ProductLayout from "@/components/layout/ProductLayout";
import BreadCrumb from "@/components/shared/BreadCrumb";
import { SectionBreaker } from "@/components/shared/Breaker";
import React from "react";

const Layout = ({ children }) => {
  return (
    <ProductLayout>
      <SectionBreaker />
      <BreadCrumb />
      {children}
    </ProductLayout>
  );
};

export default Layout;
