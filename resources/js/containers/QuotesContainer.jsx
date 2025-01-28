import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ResponsivePagination from 'react-responsive-pagination';
// import 'react-responsive-pagination/themes/classic.css';
// import 'react-responsive-pagination/themes/minimal.css';
import QuotesGrid from '../components/quotes/QuotesGrid.jsx';


const urls = {
    all: '/api/quotes',
    my: '/api/quotes/my',
};

export default function QuotesContainer({ type }) {
    const [quotes, setQuotes] = useState(null);

    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(null);

    function getQuotes(page) {
        axios.get(
            `${urls[type] || urls.all}?page=${page}`
        ).then(response => {
            setQuotes(response.data.quotes);

            setCurrentPage(page);
            setTotalPages(response.data.totalPages);
        }).catch(error => {
            console.error(error.message);
        });
    }

    useEffect(() => {
        getQuotes(1);
    }, []);

    return (
        <div>
            <QuotesGrid quotes={quotes} />
            <ResponsivePagination
                current={currentPage}
                total={totalPages}
                onPageChange={(newPage) => getQuotes(newPage)}
                className="flex justify-center m-2 mt-4"
                pageItemClassName="bg-slate-100 hover:bg-slate-600 hover:text-slate-100"
                activeItemClassName="bg-slate-700 text-slate-100"
                disabledItemClassName="text-slate-300 pointer-events-none"
                pageLinkClassName="inline-block py-2 px-4"
                previousClassName="rounded-l-md"
                nextClassName="rounded-r-md"
            />
        </div>
    );
}
