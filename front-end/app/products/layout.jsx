import ProductLayout from "@/components/layout/ProductLayout";
import BreadCrumb from "@/components/shared/BreadCrumb";
import { ContentBreaker } from "@/components/shared/Breaker";
import React from "react";

const Layout = ({ children }) => {
  return (
    <ProductLayout>
      <ContentBreaker />
      <BreadCrumb />
      {children}
    </ProductLayout>
  );
};

export default Layout;
