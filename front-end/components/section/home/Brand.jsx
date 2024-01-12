"use client";
import "@/public/css/brand.css";
import React from "react";

const Brand = () => {
  return (
    <div className="overflow-hidden">
      <div className="relative flex min-w-full select-none items-center justify-center overflow-visible p-[128px] ">
        <div className=" z-[1] ml-[12px] flex h-[40px] w-[40px] shrink-0 items-center justify-center rounded-full border border-slate-100 bg-slate-50">
          <div className="nike h-16 w-16 bg-slate-800"></div>
        </div>
        <div className=" z-[1] ml-[12px] flex h-[56px] w-[56px] shrink-0 items-center justify-center rounded-full border border-slate-100 bg-slate-50 backdrop-blur">
          <div className="nike h-16 w-16 bg-slate-800"></div>
        </div>
        <div className=" z-[1] ml-[12px] flex h-[72px] w-[72px] shrink-0 items-center justify-center rounded-full border border-slate-100 bg-slate-50 backdrop-blur">
          <div className="nike h-16 w-16 bg-slate-800"></div>
        </div>
        <div
          id="middleIcon"
          className=" z-[1] ml-[12px] flex h-[96px] w-[96px] shrink-0 items-center justify-center rounded-full border border-slate-100 bg-slate-50  backdrop-blur"
        >
          <div className="nike h-16 w-16 bg-slate-800"></div>
        </div>
        <div
          id="right1"
          className=" z-[1] ml-[12px] flex h-[72px] w-[72px] shrink-0 items-center justify-center rounded-full border border-slate-100 bg-slate-50  backdrop-blur"
        >
          <div className="nike h-16 w-16 bg-slate-800"></div>
        </div>
        <div className=" z-[1] ml-[12px] flex h-[56px] w-[56px] shrink-0 items-center justify-center rounded-full border border-slate-100 bg-slate-50  backdrop-blur">
          <div className="nike h-16 w-16 bg-slate-800"></div>
        </div>
        <div className=" z-[1] ml-[12px] flex h-[40px] w-[40px] shrink-0 items-center justify-center rounded-full border border-slate-100 bg-slate-50  backdrop-blur">
          <div className="nike h-16 w-16 bg-slate-800"></div>
        </div>
        <div className="absolute left-1/2 top-1/2 z-0 ml-[6px] h-[242px] w-[242px] -translate-x-1/2 -translate-y-1/2 overflow-visible">
          <div className="absolute left-1/2 top-1/2 h-[128px] w-[128px] origin-center  -translate-x-1/2 -translate-y-1/2 rounded-full border border-slate-100 "></div>
          <div className="absolute left-1/2 top-1/2 h-[192px] w-[192px] origin-center  -translate-x-1/2 -translate-y-1/2 rounded-full border border-slate-100 "></div>
          <div className="absolute left-1/2 top-1/2 h-[250px] w-[250px] origin-center  -translate-x-1/2 -translate-y-1/2 rounded-full border border-slate-100 "></div>
        </div>
      </div>
      <p className="text-center font-semibold uppercase tracking-widest">
        multibrand
      </p>
      <p className="text_primary text-center text-3xl font-bold ">
        Tất cả các thương hiệu. Tất cả những sản phẩm.
      </p>
    </div>
  );
};

export default Brand;
