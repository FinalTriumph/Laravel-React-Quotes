import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';
import SectionTitle from '../../components/SectionTitle.jsx';

export default function AllQuotes({ page, sources }) {
    return (
        <div className="text-left">
            <SectionTitle title="All Saved Quotes" />
            <QuotesContainer type="all" page={page} sources={sources} />
        </div>
    );
}